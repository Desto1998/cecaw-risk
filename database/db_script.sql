drop table if exists clients;
create table clients
(
    client_id       bigint(20) unsigned primary key AUTO_INCREMENT,
    nom_client      varchar(255) not null,
    prenom_client   varchar(255) not null,
    date_naissance  date         not null,
    telephone       varchar(14)  not null,
    ville_residence varchar(255) not null,
    agence          varchar(255) not null,
    created_at      TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at      DATETIME  DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

drop table if exists agences;
create table agences
(
    agence_id       bigint(20) unsigned primary key AUTO_INCREMENT,
    nom_agence      varchar(255) not null,
    adresse_agence   varchar(255) not null,
    ville_agence  varchar(255)         not null,
    created_at      TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at      DATETIME  DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

drop table if exists risques;
create table risques
(
    risque_id       bigint(20) unsigned primary key AUTO_INCREMENT,
    montant_pret float  not null,
    avance      float  not null,
    reste      float  not null,
    date_pret  date         not null,
    date_reglement  date         not null,
    statut_declaration  int  not null,
    commentaire  varchar(5000)  not null,
    compte  varchar(20)  not null,
    agence_id          bigint(20) unsigned not null,
    user_id             bigint(20) unsigned not null,
    client_id             bigint(20) unsigned not null,
    foreign key (user_id) references users (id) on delete cascade,
    foreign key (client_id) references clients (client_id) on delete cascade,
    foreign key (agence_id) references agences (agence_id) on delete cascade,
    created_at      TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at      DATETIME  DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

drop table if exists remboursements;
create table remboursements
(
    rem_id       bigint(20) unsigned primary key AUTO_INCREMENT,
    montant      float not null,
    date_re   date not null,
    risque_id             bigint(20) unsigned not null,
    foreign key (risque_id) references risques (risque_id) on delete cascade,
    created_at      TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at      DATETIME  DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)ENGINE=InnoDB DEFAULT CHARSET=utf8;
