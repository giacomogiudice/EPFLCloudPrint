#!/bin/sh
if [ $(uname) = "Linux" ]; then
	echo "Linux configuaration detected";
	PPD_EXTENTION=".gz";
else
	if [ $(uname) = "Darwin" ]; then
		echo "Mac OS configuaration detected";
		PPD_EXTENTION="";
	else
		echo "Unknow Operation System";
		exit 1;
	fi
fi

echo "create directory CloudPrintUpload for uploading files in /tmp";
dir="/tmp/CloudPrintUpload";
if [ -e $dir ]
then
	rm -r $dir;
fi
#Create a folder that everybody can write in
mkdir -m o+wr $dir;


echo "Adding a printer named mainPrinter\n";
lpadmin -x mainPrinter;

lpadmin -p mainPrinter -E -v lpd://print1.epfl.ch/pool1 -P /usr/share/cups/model/xr_WorkCentre7655R.ppd$PPD_EXTENTION;
