create table if not exists grupa_korisnika(
id_grupe int primary key auto_increment,
naziv_grupe varchar(20) not null
);

create table if not exists korisnik(
id_korisnika int primary key auto_increment,
korisnicko_ime varchar(30) not null unique,
lozinka varchar(32) not null,
zabrana int not null, 
id_grupe int not null,
foreign key (id_grupe) references grupa_korisnika (id_grupe) on delete no action on update no action 
);

create table if not exists kategorija(
id_kategorije int primary key auto_increment,
tema_kategorije varchar(50) not null unique,
id_korisnika int,
foreign key (id_korisnika) references korisnik (id_korisnika)  on delete set null on update cascade
);

create table if not exists poruka(
id_poruke int primary key auto_increment,
sadrzaj varchar(500) not null,
datum timestamp, 
id_korisnika int not null,
foreign key (id_korisnika) references korisnik (id_korisnika) on delete cascade on update cascade,
id_kategorije int not null,
foreign key (id_kategorije) references kategorija (id_kategorije) on delete cascade on update cascade
);


insert into grupa_korisnika (naziv_grupe) values
('admin'),
('moderator'),
('korisnik');

insert into korisnik(korisnicko_ime, lozinka, zabrana, id_grupe) values
('AceT3p',  md5('WhiteWolf78'), 1, 1),
('kira',  md5('Kira661'), 1, 2),
('jack',  md5('JackLondon'), 1, 2);

insert into kategorija (tema_kategorije, id_korisnika) values
('tehnologija', 1),
('hakiranje', 1),
('programiranje', 1);

insert into poruka (sadrzaj, datum, id_korisnika, id_kategorije) values
('Ima netko dobar text editor?', '21/11/2020-20:09', 2, 3),
('Probaj sublime.', '21/11/2020-20:10', 1, 3),
('Jeste li čuli o novom rayzen procesoru?!', '21/11/2020-20:10', 3, 1),
('Što mislite o zsh? Meni se iskreno više sviđa bash..', '21/11/2020-20:11', 2, 2);


