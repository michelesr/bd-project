#! /bin/sh 
cmd='mysql --user=bdt --password=bdt' 
for x in Struct View Procedure Trigger Data 
do
   $cmd < "BDT_$x.sql" 
done 
