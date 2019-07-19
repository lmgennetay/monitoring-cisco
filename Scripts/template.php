set username  %username%
set password %password%
set enable_pwd %enable_password%
set switch %ip%

set timeout 60
spawn ssh -oStrictHostKeyChecking=no $username@$switch
sleep 2
expect "*ssword: "
send "$password\n"
sleep 0.5
send "enable\n"
sleep 0.5
send "$enable_pwd\n"
sleep 0.5
send "terminal length 0\n"

%commandeici%

send "end\n"
sleep 0.5
send "exit\n" 
interact