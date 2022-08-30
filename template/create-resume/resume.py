import pdfkit as pdf
import os

config = pdf.configuration(wkhtmltopdf='C:\Program Files\wkhtmltopdf\\bin\wkhtmltopdf.exe')

pdf.from_file('resume2.html','filephp3.pdf')
# pdf.from_url('http://localhost:1234/phpDataFiles/templateProject/template/create-resume/resume2.php','filephp2.pdf')