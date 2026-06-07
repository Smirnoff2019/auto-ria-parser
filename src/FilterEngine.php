<?php

namespace App;

class FilterEngine
{
    /**
     * @var array
     */
    private array $normalizedRules = [];

    /**
     * @param array $brands
     */
    public function __construct(array $brands)
    {
        foreach ($brands as $brand => $config) {

            $brandRules = $this->normalizeRules($config);

            foreach ($config['models'] as $model => $modelRules) {

                $modelRules = $this->normalizeRules($modelRules);

                // модель перезаписує бренд
                $this->normalizedRules[$brand][$model] =
                    array_replace_recursive($brandRules, $modelRules);
            }
        }
    }

    /**
     * @param array $rules
     * @return array
     */
    private function normalizeRules(array $rules): array
    {
        foreach ($rules as $key => $value) {

            if ($key === 'id') {
                continue; // не чіпаємо ID
            }

            if (is_array($value)) {
                $rules[$key] = $this->normalizeRules($value);
            }
            elseif (is_string($value)) {
                $rules[$key] = strtolower($value);
            }
            else {
                $rules[$key] = $value;
            }
        }

        return $rules;
    }

    /**
     * @param array $car
     * @param string $brand
     * @param string $model
     * @return bool
     */
    public function pass(array $car, string $brand, string $model): bool
    {
        $rules = $this->normalizedRules[$brand][$model] ?? [];

        $color   = strtolower($car['color']['name'] ?? '');
        $gearbox = $this->normalizeGearbox($car['autoData']['gearboxName'] ?? '');
        $fuel    = $this->normalizeFuel($car['autoData']['fuelName'] ?? '');
        $drive   = $this->normalizeDrive($car['autoData']['driveName'] ?? '');
        $engine  = (string)($car['autoData']['engineVolume'] ?? '');
        $body    = strtolower($car['autoData']['bodyName'] ?? '');
        $mileage = (int)($car['autoData']['raceInt'] ?? 0);
        $year    = (int)($car['autoData']['year'] ?? 0);

        if (!empty($rules['exclude_colors']) && in_array($color, $rules['exclude_colors'])) return false;

        if (!empty($rules['transmission']) && $gearbox !== '' && !in_array($gearbox, $rules['transmission'])) {
            return false;
        }

        if (!empty($rules['fuel']) && !in_array($fuel, $rules['fuel'])) return false;

        if (!empty($rules['exclude_fuel']) && in_array($fuel, $rules['exclude_fuel'])) return false;

        if (!empty($rules['drive']) && !in_array($drive, $rules['drive'])) return false;

        if (!empty($rules['exclude_engine'])) {
            foreach ($rules['exclude_engine'] as $e) {
                if (str_contains($engine, $e)) return false;
            }
        }

        if (!empty($rules['exclude_body']) && in_array($body, $rules['exclude_body'])) return false;

        if (!empty($rules['max_mileage']) && $mileage > $rules['max_mileage']) return false;

        if (!empty($rules['year_from']) && $year < $rules['year_from']) return false;

        return true;
    }

    /**
     * @param string $value
     * @return string
     */
    private function normalizeFuel(string $value): string
    {
        $value = mb_strtolower($value);

        if (str_contains($value, 'бензин')) return 'бензин';
        if (str_contains($value, 'дизель')) return 'дизель';
        if (str_contains($value, 'газ')) return 'газ';
        if (str_contains($value, 'гібрид')) return 'гібрид';

        return $value;
    }

    /**
     * @param string $value
     * @return string
     */
    private function normalizeGearbox(string $value): string
    {
        $value = mb_strtolower($value);

        if (str_contains($value, 'авто')) return 'automatic';
        if (str_contains($value, 'мех')) return 'mechanical';
        if (str_contains($value, 'вариатор')) return 'cvt';

        return '';
    }

    /**
     * @param string $value
     * @return string
     */
    private function normalizeDrive(string $value): string
    {
        $value = mb_strtolower($value);

        if (str_contains($value, 'повний')) return 'awd';
        if (str_contains($value, 'передній')) return 'fwd';
        if (str_contains($value, 'задній')) return 'rwd';

        return '';
    }
}
