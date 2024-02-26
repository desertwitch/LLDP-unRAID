#!/bin/bash
BOOT="/boot/config/plugins/ulldpd"
DOCROOT="/usr/local/emhttp/plugins/ulldpd"

# Add LLDPD group and user
if [ "$( grep -ic "3470" /etc/group )" -eq 0 ]; then
    groupadd -g 3470 _lldpd
fi

if [ "$( grep -ic "3470" /etc/passwd )" -eq 0 ]; then
    useradd -d /run/lldpd -s /bin/false -u 3470 -g _lldpd _lldpd
fi

# Update file permissions of scripts
chmod +0755 $DOCROOT/scripts/*
chmod +0755 /etc/rc.d/rc.lldpd

# Copy the default configuration file
cp -n $DOCROOT/default.cfg $BOOT/ulldpd.cfg >/dev/null 2>&1
