import os


def list_dir(path):
	list_file=[]
	list_file=os.listdir(path)
	return list_file


def change_dir(path):
	os.chdir(path)


change_dir("/home/mancube/Downloads/data/a10/p1")
list_file= list(list_dir("/home/mancube/Downloads/data/a10/p1"))



print list_file
def write_file(inputfile,outputfile):
	list_column = 'number,T1_xacc,T2_yacc,T3_zacc,T4_xgyro,T5_ygyro,T6_zgyro,T7_xmag,T8_ymag,T9_zmag,RA_xacc,RA_yacc,RA_zacc,RA_xgyro,RA_ygyro,RA_zgyro,RA_xmag,RA_ymag,RA_zmag,LA_xacc,LA_yacc,LA_zacc,LA_xgyro,LA_ygyro,LA_zgyro,LA_xmag,LA_ymag,LA_zmag,RL_xacc,RL_yacc,RL_zacc,RL_xgyro,RL_ygyro,RL_zgyro,RL_xmag,RL_ymag,RL_zmag,LL_xacc,LL_yacc,LL_zacc,LL_xgyro,LL_ygyro,LL_zgyro,LL_xmag,LL_ymag,LL_zmag'
	header_list=list_column.split(',')
	columns = header_list

	list_dir(os.getcwd())
	with open(inputfile,'rb') as fin:
		with open(outputfile,'wb+') as fout:
			a = fin.readlines()
			fout.write(list_column+'\n')
			i=1
			for line in a:
				#print line
				
				string_interm="%s,"%i
				string_interma=string_interm+line
				fout.write(string_interma)
				i=i+1

			#add first line
			#add first column(len)
for i in range(len(list_file)):
	write_file(list_file[i],'/home/mancube/Downloads/data/a10/p1a/'+list_file[i])