set username  %username%
set password %password%
set enable_pwd %enable_password%
set switch %ip%

set timeout 10
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
expect "#"

%commandeici%

send "end\n"
expect "#"
send "exit\n" 
interact
