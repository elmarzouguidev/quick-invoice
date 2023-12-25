<?php

namespace App\Enums\Company;

enum CompanyType: int
{
    case SARL = 1;
    case SARLAU = 2;
    case AUTOENTREPRENEUR = 3;
    case ASSOCIATION = 4;
    case SA = 5;
    case SCI = 6;

    public function getColor(): string
    {
        return match ($this) {
            CompanyType::SARL => 'bg-success',
            CompanyType::SARLAU => 'bg-success',
            CompanyType::AUTOENTREPRENEUR => 'bg-success',
            CompanyType::ASSOCIATION => 'bg-success',
            CompanyType::SA => 'bg-success',
            CompanyType::SCI => 'bg-success',
        };
    }

    public function getName(): string
    {
        return match ($this) {

            self::SARL => 'SARL',
            self::SARLAU => 'SARL-AU ou EURL',
            self::AUTOENTREPRENEUR => 'Auto Entrepreneur',
            self::ASSOCIATION => 'Association',
            self::SA => 'Société Anonyme (SA)',
            self::SCI => 'Société Civile Immobilière (SCI)',
        };
    }

    public static function options()
    {
        return collect(self::cases())
            ->mapWithKeys(fn (self $type) => [
                $type->value => $type->getName(),
            ])
            ->toArray();
    }
}
