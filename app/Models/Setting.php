<?php

namespace App\Models;

use Config;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $table = 'settings';

    protected $fillable = [
        'key', 'value'
    ];
    
        /**
     * @param array $key
     */
    public static function get($key)
    {
        $setting = new self();

        $entry = $setting->where('key', $key)->first();
        if (!$entry) {
            return;
        }

        return $entry->value;
    }

    public static function set($value = null, $key)
    {
        $setting = new self();

        $entry = $setting->where('key', $key)->firstOrFail();
        $entry->value = $value;
        $entry->saveOrFail();
        Config::set('key', $value);
        if (Config::get('key') == $value) {
            return true;
        }
        return false;
    }
}
