TEX	= latex -shell-escape
BIBTEX	= bibtex
DVIPS	= dvips
DVIPDF  = dvipdft
XDVI	= xdvi -gamma 4
GH		= gv

all: writeup

writeup:
	latex midterm_36_progress.tex
	dvips -R -Poutline -t letter midterm_36_progress.dvi -o midterm_36_progress.ps
	ps2pdf midterm_36_progress.ps

clean:
	rm -f *.ps *.dvi *.out *.log *.aux *.bbl *.blg *.pyg 

.PHONY: all show clean ps pdf showps
