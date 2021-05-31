/* Estrutura da tabela de estudantes */
CREATE TABLE `estudantes` (
  `id` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `notas` varchar(50) NOT NULL,
  `curso` varchar(50) NOT NULL,
  `resultado` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/* Alteração na tabela estudantes modificação chave primária */
ALTER TABLE `estudantes`
  ADD PRIMARY KEY (`id`);


/* Alteração na tabela estudantes modo auto increment */
ALTER TABLE `estudantes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;