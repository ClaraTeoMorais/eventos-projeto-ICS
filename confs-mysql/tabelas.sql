create database eventos;
use eventos;

CREATE TABLE Categoria (
    id int AUTO_INCREMENT NOT NULL,
    nome varchar(100) NOT NULL,
    PRIMARY KEY(id)
);

CREATE TABLE Evento (
    id int AUTO_INCREMENT NOT NULL,
    categoria_id int NOT NULL,
    titulo varchar(100) NOT NULL,
    descricao text NOT NULL,
    data date NOT NULL,
    horario time NOT NULL,
    local varchar(200) NOT NULL,
    PRIMARY KEY(id),
    FOREIGN KEY (categoria_id) REFERENCES Categoria(id)
);

--  INSERTS

insert into Categoria values (null, 'Palestra'), (null, 'Workshop'), (null, 'Seminário'), (null, 'Curso'), (null, 'Extensão');

insert into Evento values (
    (1, 'Palestra sobre Carreira em TI',
    'Discussão sobre mercado de trabalho, estágios e oportunidades na área de Tecnologia da Informação.',
    '2026-03-10', '19:00:00', 'Miniauditorio do bloco C'),
    (2, 'Workshop de Desenvolvimento Web',
    'Atividade prática com introdução a HTML, CSS e JavaScript.',
    '2026-03-15', '14:00:00', 'Laboratório 7 da DIATINF'),
    (3, 'Seminário de Inovação Tecnológica',
    'Apresentação de projetos e debates sobre inovação no ambiente acadêmico.',
    '2026-03-20', '09:00:00', 'Audiovisual 1'),
    (4, 'Curso de Git e GitHub',
    'Curso introdutório sobre controle de versões para estudantes de tecnologia.',
    '2026-03-25', '18:30:00', 'Laboratório 5 da DIATINF'),
    (5, 'Projeto de Extensão em Comunidades Locais',
    'Evento de lançamento de ações de extensão voltadas para inclusão digital.',
    '2026-04-02', '08:00:00', 'Miniauditorio do bloco C'
    )
);