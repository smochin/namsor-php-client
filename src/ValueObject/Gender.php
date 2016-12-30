<?php

declare(strict_types=1);

namespace Smochin\Namsor\ValueObject;

class Gender
{
    const MALE_GENDER = 'male';
    const FEMALE_GENDER = 'female';

    /**
     * @var string
     */
    private $value;

    /**
     * @param string $value
     *
     * @throws \InvalidArgumentException
     */
    public function __construct(string $value)
    {
        if (!in_array($value, [self::MALE_GENDER, self::FEMALE_GENDER])) {
            throw new \InvalidArgumentException('Invalid gender');
        }

        $this->value = $value;
    }

    /**
     * @return string
     */
    public function getValue(): string
    {
        return $this->value;
    }

    /**
     * @return bool
     */
    public function isMale(): bool
    {
        return $this->value == self::MALE_GENDER;
    }

    /**
     * @return bool
     */
    public function isFemale(): bool
    {
        return $this->value == self::FEMALE_GENDER;
    }
}
