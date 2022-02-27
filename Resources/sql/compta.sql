-- Gain in 2021
SELECT SUM(value)
FROM cpt_compta WHERE
month between '2021-01' AND '2021-12'
AND idType = 1