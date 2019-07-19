set username  test
set password test
set enable_pwd test
set switch 125.24.00.00

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

send "interface range , … \n"
sleep 0.5
send "switchport mode access \n"
sleep 0.5
send "switchport access vlan N° (unique) de vlan\n"
sleep 0.5


send "end\n"
sleep 0.5
send "exit\n" 
interact