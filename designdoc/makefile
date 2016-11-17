TEX	= latex -shell-escape
BIBTEX	= bibtex
DVIPS	= dvips
DVIPDF  = dvipdft
XDVI	= xdvi -gamma 4
GH		= gv

all: writeup

writeup:
	latex problem_statement.tex
	dvips -R -Poutline -t letter problem_statement.dvi -o problem_statement.ps
	ps2pdf problem_statement.ps

clean:
	rm -f *.ps *.dvi *.out *.log *.aux *.bbl *.blg *.pyg 

.PHONY: all show clean ps pdf showps
