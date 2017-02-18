TEX	= latex -shell-escape
BIBTEX	= bibtex
DVIPS	= dvips
DVIPDF  = dvipdft
XDVI	= xdvi -gamma 4
GH		= gv

all: writeup

writeup:
	latex winter_progress_report.tex
	dvips -R -Poutline -t letter winter_progress_report.dvi -o winter_progress_report.ps
	ps2pdf winter_progress_report.ps

clean:
	rm -f *.ps *.dvi *.out *.log *.aux *.bbl *.blg *.pyg 

.PHONY: all show clean ps pdf showps
