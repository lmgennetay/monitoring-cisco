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

#pour chaque ligne de commande, mettre "send" devant la commande, mettre des "" autour de la ligne de commande et mettre un sleep de 0.5 après la commnade.
#Si il y à plusieurs commandes, répeter le même processus pour faire suivre les commandes


# La balise interact est obligatoire pour récupérer le résultat des commandes.
# La ligne de commande "end" doit se trouver avec cette balise interact sinon le script se bloquera

 send "exit\n" 
 interacttexte