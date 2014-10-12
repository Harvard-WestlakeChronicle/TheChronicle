now=$(date)
git add -A
git commit -m "update on $now"
git push origin hwchronicle_secure
logger -s "Succesfully pushed changes (if any) to hwchronicle_secure on $now" 2>> /home/hwchroniclesecure/git.log
