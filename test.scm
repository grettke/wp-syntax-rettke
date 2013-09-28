#lang scheme
(printf "Parentheses~n")
[printf "Brackets~n"]
{printf "Squigglies~n"}
; single line comment
#| multi
   line
   comment
|#
'(quote . dot)
#\1
`('quasiquote ,(length '()) ,@(list (length '(a))))
#'(a)
#`(,(length '()) ,@(list (length '(a))))
