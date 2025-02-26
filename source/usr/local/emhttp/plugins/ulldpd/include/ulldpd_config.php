<?PHP
/* Copyright Derek Macias (parts of code from NUT package)
 * Copyright macester (parts of code from NUT package)
 * Copyright gfjardim (parts of code from NUT package)
 * Copyright SimonF (parts of code from NUT package)
 * Copyright desertwitch
 *
 * Copyright Dan Landon
 * Copyright Bergware International
 * Copyright Lime Technology
 *
 * This program is free software; you can redistribute it and/or
 * modify it under the terms of the GNU General Public License 2
 * as published by the Free Software Foundation.
 *
 * The above copyright notice and this permission notice shall be
 * included in all copies or substantial portions of the Software.
 *
 */
$ulldpd_cfg                 = parse_ini_file("/boot/config/plugins/ulldpd/ulldpd.cfg");

$ulldpd_service             = trim(isset($ulldpd_cfg['SERVICE'])        ? htmlspecialchars($ulldpd_cfg['SERVICE'])          : 'disable');
$ulldpd_force               = trim(isset($ulldpd_cfg['FORCE'])          ? htmlspecialchars($ulldpd_cfg['FORCE'])            : 'disable');
$ulldpd_cdp                 = trim(isset($ulldpd_cfg['CDP'])            ? htmlspecialchars($ulldpd_cfg['CDP'])              : 'disable');
$ulldpd_fdp                 = trim(isset($ulldpd_cfg['FDP'])            ? htmlspecialchars($ulldpd_cfg['FDP'])              : 'disable');
$ulldpd_sonmp               = trim(isset($ulldpd_cfg['SONMP'])          ? htmlspecialchars($ulldpd_cfg['SONMP'])            : 'disable');
$ulldpd_edp                 = trim(isset($ulldpd_cfg['EDP'])            ? htmlspecialchars($ulldpd_cfg['EDP'])              : 'disable');

$ulldpd_running             = (intval(trim(shell_exec( "[ -f /proc/`cat /run/lldpd/pid 2> /dev/null`/exe ] && echo 1 || echo 0 2> /dev/null" ))) === 1 );
$ulldpd_installed_backend   = trim(shell_exec("find /var/log/packages/ -type f -iname 'lldpd*' ! -iname 'ulldpd*' -printf '%f\n' 2> /dev/null"));
?>
