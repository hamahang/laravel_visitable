<?php


function LVS_Date_GtoJ($GDate = null, $Format = "Y/m/d-H:i", $convert = true)
{
    if ($GDate == '-0001-11-30 00:00:00' || $GDate == null)
    {
        return '--/--/----';
    }
    $date = new Hamahang\LVS\Helpers\Classes\jDateTime($convert, true, 'Asia/Tehran');
    $time = is_numeric($GDate) ? strtotime(date('Y-m-d H:i:s', $GDate)) : strtotime($GDate);

    return $date->date($Format, $time);

}
function LVS_Date_JtoG($jDate, $delimiter = '/', $to_string = false, $with_time = false, $input_format = 'Y/m/d H:i:s')
{
    $jDate = ConvertNumbersFatoEn($jDate);
    $parseDateTime = Hamahang\LVS\Helpers\Classes\jDateTime::parseFromFormat($input_format, $jDate);
    $r = Hamahang\LVS\Helpers\Classes\jDateTime::toGregorian($parseDateTime['year'], $parseDateTime['month'], $parseDateTime['day']);
    if ($to_string)
    {
        if ($with_time)
        {
            $r = $r[0] . $delimiter . $r[1] . $delimiter . $r[2] . ' ' . $parseDateTime['hour'] . ':' . $parseDateTime['minute'] . ':' . $parseDateTime['second'];
        }
        else
        {
            $r = $r[0] . $delimiter . $r[1] . $delimiter . $r[2];
        }
    }

    return ($r);
}

function LVS_getEncodeId($id)
{
    if ($id < 0)
    {
        return $id;
    }
    else
    {
        $hashids = new \Hashids\Hashids(md5('sadeghi'));

        return $hashids->encode($id);
    }

}
?>