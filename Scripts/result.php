set username  test
set password test
set enable_pwd test
set switch 125.24.00.00

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

send "interface range , … \n"
expect "#"
send "duplex auto \n"
expect "#"


send "end\n"
expect "#"
send "exit\n" 
interact
