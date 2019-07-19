set username  %username%
set password %password%
set enable_pwd %enable_password%
set switch %ip%

set timeout 60
spawn ssh -oStrictHostKeyChecking=no $username@$switch
sleep 2
expect "*ssword: "
send "$password\n"
expect ">"
send "enable\n"
expect "*ssword: "
send "$enable_pwd\n"
expect "#"
send "terminal length 0\n"

%commandeici%

send "end\n"
sleep 0.5
send "exit\n" 
interact
