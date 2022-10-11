cd /var/www/html
mkdir old2
mv * old2
mv old2 old
wget https://github.com/Kai-Barry/nutshell/archive/refs/heads/main.zip
unzip main.zip
rm main.zip
ls -la
mv nutshell-main/* .
rm -r nutshell-main
mv old/genPage.sh .
mv old/summarise.sh .
mv old/pages/*.data pages/
mv old/stats/*.json ./stats/
chmod +x updateSite.sh
chmod -R g+w .
sudo chgrp -R sysadmin .
#Line below must be last
sudo chown -R www-data .