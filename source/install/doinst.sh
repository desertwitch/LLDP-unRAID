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

# Add LLDPD group and user
if [ "$( grep -ic "347" /etc/group )" -eq 0 ]; then
    groupadd -g 347 _lldpd >/dev/null 2>&1
fi

if [ "$( grep -ic "347" /etc/passwd )" -eq 0 ]; then
    useradd -d /run/lldpd -s /bin/false -u 347 -g _lldpd _lldpd >/dev/null 2>&1
fi

# Update file permissions of scripts
chmod +0755 $DOCROOT/scripts/*
chmod +0755 /etc/rc.d/rc.lldpd

# Copy the default configuration file
cp -n $DOCROOT/default.cfg $BOOT/ulldpd.cfg >/dev/null 2>&1
