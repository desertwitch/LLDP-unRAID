<?
$ulldpd_cfg          = parse_ini_file("/boot/config/plugins/ulldpd/ulldpd.cfg");
$ulldpd_service      = isset($ulldpd_cfg['SERVICE'])      ? htmlspecialchars($ulldpd_cfg['SERVICE'])       : 'disable';
$ulldpd_cdp = isset($ulldpd_cfg['CDP'])      ? htmlspecialchars($ulldpd_cfg['CDP'])       : 'disable';
$ulldpd_fdp = isset($ulldpd_cfg['FDP'])      ? htmlspecialchars($ulldpd_cfg['FDP'])       : 'disable';
$ulldpd_sonmp = isset($ulldpd_cfg['SONMP'])      ? htmlspecialchars($ulldpd_cfg['SONMP'])       : 'disable';
$ulldpd_edp = isset($ulldpd_cfg['EDP'])      ? htmlspecialchars($ulldpd_cfg['EDP'])       : 'disable';
$ulldpd_running      = (intval(trim(shell_exec( "[ -f /proc/`cat /run/lldpd/pid 2> /dev/null`/exe ] && echo 1 || echo 0 2> /dev/null" ))) === 1 );
$ulldpd_installed_backend = trim(shell_exec("find /var/log/packages/ -type f -iname 'lldpd*' ! -iname 'ulldpd*' -printf '%f\n' 2> /dev/null"));
?>
