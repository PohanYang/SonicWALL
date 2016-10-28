tail -f /var/log/sonicwall|grep "Alert"|awk -f matchapp - python buffer.py
