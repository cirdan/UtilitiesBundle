<?php

namespace SF\UtilitiesBundle\Twig;

use Symfony\Component\Locale\Locale;

class SFTwigExtension extends \Twig_Extension
{
    protected $converter;
    protected $translator;

    
    public function getFilters()
    {
        return array(
            'localeDate'  => new \Twig_Filter_Function('\SF\UtilitiesBundle\Twig\SFTwigExtension::localeDateFilter'),
            'weekDay'  => new \Twig_Filter_Function('\SF\UtilitiesBundle\Twig\SFTwigExtension::weekDayFilter'),
            'monthDay'  => new \Twig_Filter_Function('\SF\UtilitiesBundle\Twig\SFTwigExtension::monthDayFilter'),
            'month'  => new \Twig_Filter_Function('\SF\UtilitiesBundle\Twig\SFTwigExtension::monthFilter'),
        );
    }
    
    /**
     * Translate a timestamp to a localized string representation.
     * Parameters dateType and timeType defines a kind of format. Allowed values are (none|short|medium|long|full).
     * Default is medium for the date and no time.
     * Uses default system locale by default. Pass another locale string to force a different translation.
     * You might not like the default formats, so you can pass a custom pattern as last argument.
     *
     * @param mixed $date
     * @param string $dateType
     * @param string $timeType
     * @param mixed $locale
     * @param string $pattern
     *
     * @return string The string representation
     */
    public static function localeDateFilter($date, $dateType = 'medium', $timeType = 'none')
    {
        $timestamp=(int)$date->format("U");
        setlocale(LC_TIME, "fr_FR");
        //$fmt = new \IntlDateFormatter( "fr_FR" ,$dateType, $timeType);
        //return $fmt->format($timestamp);

        return strftime("%A %e %B",$timestamp);
    }
    public static function monthDayFilter($date, $dateType = 'medium', $timeType = 'none')
    {
        $timestamp=(int)$date->format("U");
        setlocale(LC_TIME, "fr_FR");
        //$fmt = new \IntlDateFormatter( "fr_FR" ,$dateType, $timeType);
        //return $fmt->format($timestamp);

        return strftime("%e",$timestamp);
    }
    public static function monthFilter($date, $dateType = 'medium', $timeType = 'none')
    {
        $timestamp=(int)$date->format("U");
        setlocale(LC_TIME, "fr_FR");
        //$fmt = new \IntlDateFormatter( "fr_FR" ,$dateType, $timeType);
        //return $fmt->format($timestamp);

        return strftime("%B",$timestamp);
    }

    public static function weekDayFilter($date, $dateType = 'medium', $timeType = 'none')
    {
        $timestamp=(int)$date->format("U");
        setlocale(LC_TIME, "fr_FR");
        //$fmt = new \IntlDateFormatter( "fr_FR" ,$dateType, $timeType);
        //return $fmt->format($timestamp);

        return strftime("%A",$timestamp);
    }

    public function getName()
    {
        return 'SFTwigExtension';
    }
}
