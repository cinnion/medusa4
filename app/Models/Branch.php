<?php

namespace App\Models;

use MongoDB\Laravel\Eloquent\Model;

/**
 * Class Branch
 * @package App\Models
 *
 * @property string id
 * @property string branch
 * @property string branch_name
 * @property array equivalent
 * @property object created_at
 * @property object updated_at
 */
class Branch extends Model
{
    /**
     * @var string[] The attributes that are mass assignable.
     */
    protected $fillable = [
        'branch',
        'branch_name'
    ];

    /**
     * Get a list of branches for use in a select element.
     *
     * @return array
     */
    public static function getBranchList()
    {
        foreach (self::all(['branch', 'branch_name']) as $branch) {
            $branches[$branch['branch']] = $branch['branch_name'];
        }

        asort($branches);

        $branches = ['' => 'Select a Branch'] + $branches;

        return $branches;
    }

    /**
     * Get an enhanced list of branches for use in a select element.
     *
     * This includes options for Civil Service and RMMM divisions.
     *
     * Options:
     *  - include_civil_divisions (bool) Include Diplomatic Corps and Special Intelligence Service as options. Default true.
     *  - include_rmmm_divisions (bool) Include RMMM Divisions as options. Default true.
     *
     * @param array $options
     * @return array
     */
    public static function getEnhancedBranchList(array $options = []): array
    {
        // Default options
        $includeCivilDivisions = true;
        $includeRmmmDivisions = true;

        if (array_key_exists('include_civil_divisions', $options) === true) {
            $includeCivilDivisions = $options['include_civil_divisions'];
        }

        if (array_key_exists('include_rmmm_divisions', $options) === true) {
            $includeRmmmDivisions = $options['include_rmmm_divisions'];
        }

        $branches = [];

        foreach (self::where('branch', '!=', 'CIVIL')->get(['branch', 'branch_name']) as $branch) {
            $branches[$branch['branch']] = $branch['branch_name'];
        }

        if ($includeCivilDivisions === true) {
            $branches['DIPLOMATIC'] = 'Diplomatic Corps';
            $branches['INTEL'] = 'Special Intelligence Service';
        } else {
            $branches['CIVIL'] = 'Civil Service';
        }

        if ($includeRmmmDivisions === true) {
            $branches['BASIC'] = "RMMM BASIC Division";
            $branches['MEDICAL'] = "RMMM Medical Division";
            $branches['CATERING'] = "RMMM Catering Division";
            $branches['ENG'] = "RMMM Engineering Division";
            $branches['DECK'] = "RMMM Deck Division";
        }

        asort($branches);

        $branches = ['' => 'Select a Branch'] + $branches;

        return $branches;
    }

    /**
     * Get a list of naval branches for use in a select element.
     *
     * @return string[]
     */
    public static function getNavalBranchList(): array
    {
        foreach (self::whereIn('branch', MedusaConfig::get('chapter.naval', ['RMN', 'GSN', 'IAN', 'RHN']))
                     ->get(['branch', 'branch_name']) as $branch) {
            $branches[$branch['branch']] = $branch['branch_name'];
        }

        asort($branches);

        $branches = ['' => 'Select a Branch'] + $branches;

        return $branches;
    }

    /**
     * Get the full branch name from the branch code.
     *
     * @param string $branch The branch code.
     * @return string The full branch name.
     */
    public static function getBranchName(string $branch): string
    {
        $res = self::where('branch', $branch)->first();

        return $res['branch_name'];
    }

    /**
     * Check if this is a military branch.
     *
     * @return bool
     */
    public function isMilitaryBranch(): bool
    {
        $militaryBranches = [
            'RMN',
            'RMMC',
            'RMA',
            'GSN',
            'RHN',
            'IAN',
        ];

        return in_array($this->branch, $militaryBranches);
    }

    /**
     * Check if this is a civilian branch.
     *
     * @return bool
     */
    public function isCivilianBranch(): bool
    {
        $civilianBranches = [
            'CIVIL',
            'SFC',
            'RMMM',
            'RMACS',
        ];

        return in_array($this->branch, $civilianBranches);
    }
}
