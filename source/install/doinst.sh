#!/bin/bash
#
# Copyright Derek Macias (parts of code from NUT package)
# Copyright macester (parts of code from NUT package)
# Copyright gfjardim (parts of code from NUT package)
# Copyright SimonF (parts of code from NUT package)
# Copyright desertwitch
#
# This program is free software; you can redistribute it and/or
# modify it under the terms of the GNU General Public License 2
# as published by the Free Software Foundation.
#
# The above copyright notice and this permission notice shall be
# included in all copies or substantial portions of the Software.
#
BOOT="/boot/config/plugins/ulldpd"
DOCROOT="/usr/local/emhttp/plugins/ulldpd"

# Copy the default configuration file
cp -n $DOCROOT/default.cfg $BOOT/ulldpd.cfg >/dev/null 2>&1

# set up plugin-specific polling tasks
rm -f /etc/cron.daily/lldp-poller >/dev/null 2>&1
ln -sf /usr/local/emhttp/plugins/ulldpd/scripts/poller /etc/cron.daily/lldp-poller >/dev/null 2>&1
chmod +x /etc/cron.daily/lldp-poller >/dev/null 2>&1

# Update file permissions of scripts
chmod 755 $DOCROOT/scripts/*
chmod 755 /etc/rc.d/rc.lldpd
