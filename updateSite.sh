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
chmod +x updateSite.sh