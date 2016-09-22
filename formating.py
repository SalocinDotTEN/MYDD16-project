import os
import errno

#list mother directory
def list_directory(path):
	list_dire=[]
	list_dire=os.listdir(path)
	return list_dire

def list_dir(path):
	list_file=[]
	list_file=os.listdir(path)
	return list_file


def change_dir(path):
	os.chdir(path)


change_dir("/home/mancube/Downloads/data/")
 #p1 ...
list_directory= list(list_dir("/home/mancube/Downloads/data")) #a1 a2 ...


def mkdir_p(path):
    try:
        os.makedirs(path)
    except OSError as exc:  # Python >2.5
        if exc.errno == errno.EEXIST and os.path.isdir(path):
            pass
        else:
            raise

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
for j in range(len(list_directory)):
	list_file = list(list_dir("/home/mancube/Downloads/data/"+list_directory[j]))
	list_file

	for i in range(len(list_file)):
		#print '/home/mancube/Downloads/data/'+list_directory[j]+'/'+list_file[i]
		a = os.listdir('/home/mancube/Downloads/data/'+list_directory[j]+'/'+list_file[i])
		a
		mkdir_p('/home/mancube/Downloads/data2/'+list_directory[j])
		for k in range(len(a)):
			#print '/home/mancube/Downloads/data/'+list_directory[j]+'dup'
			#print os.listdir('/home/mancube/Downloads/data2/')
			
			mkdir_p('/home/mancube/Downloads/data2/'+list_directory[j]+'/'+list_file[i])
			#os.mkdir('/home/mancube/Downloads/data2/'+list_directory[j] )
			
			write_file('/home/mancube/Downloads/data/'+list_directory[j]+'/'+list_file[i]+'/'+a[k],'/home/mancube/Downloads/data2/'+list_directory[j]+'/'+list_file[i]+'/'+a[k])

