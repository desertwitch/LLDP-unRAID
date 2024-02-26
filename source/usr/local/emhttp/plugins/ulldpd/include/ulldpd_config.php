<?
$ulldpd_cfg          = parse_ini_file("/boot/config/plugins/ulldpd/ulldpd.cfg");
$ulldpd_service      = isset($ulldpd_cfg['SERVICE'])      ? htmlspecialchars($ulldpd_cfg['SERVICE'])       : 'disable';
$ulldpd_running      = (intval(trim(shell_exec( "[ -f /proc/`cat /run/lldpd/pid 2> /dev/null`/exe ] && echo 1 || echo 0 2> /dev/null" ))) === 1 );
?>
