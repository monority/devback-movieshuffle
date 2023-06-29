CREATE DATABASE IF NOT EXISTS movieshuffle;

USE movieshuffle;

CREATE TABLE movies(
    id TINYINT PRIMARY KEY AUTO_INCREMENT,
    title VARCHAR(50) NOT NULL,
    description TEXT,
    releaseDate VARCHAR(12),
    duration SMALLINT,
    video VARCHAR(255),
    highlighted BOOLEAN
);


CREATE TABLE genre(
    id TINYINT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(50) NOT NULL
);


CREATE TABLE movies_genre(
    movies_id TINYINT,
    genre_id TINYINT,
    FOREIGN KEY(movies_id) REFERENCES movies(id),
    FOREIGN KEY(genre_id) REFERENCES genre(id),
    PRIMARY KEY(movies_id, genre_id)
);



INSERT INTO movies (title, description, releaseDate, duration, video, highlighted
    )
VALUES
    (
        "Inception",
        "Dom Cobb est un voleur expérimenté, le meilleur dans l'art dangereux de l'extraction, voler les secrets les plus intimes enfouis au plus profond du subconscient durant une phase de rêve, lorsque l'esprit est le plus vulnérable. Les capacités de Cobb ont fait des envieux dans le monde tourmenté de l'espionnage industriel alors qu'il devient fugitif en perdant tout ce qu'il a un jour aimé. Une chance de se racheter lui est alors offerte. Une ultime mission grâce à laquelle il pourrait retrouver sa vie passée mais uniquement s'il parvient à accomplir l'impossible inception.",
        "2010-07-21",
        148,
        "https://www.youtube.com/embed/HcoZbHBDHQA",
        false
    ),
    (
        "Interstellar",
        "Dans un futur proche, face à une Terre exsangue, un groupe d'explorateurs utilise un vaisseau interstellaire pour franchir un trou de ver permettant de parcourir des distances jusque-là infranchissables. Leur but : trouver un nouveau foyer pour l'humanité.",
        "2014-11-07",
        169,
        "https://www.youtube.com/embed/HsPP6xSzQoE",
        false
    ),
    (
        "Matrix",
        "Programmeur anonyme dans un service administratif le jour, Thomas Anderson devient Neo la nuit venue. Sous ce pseudonyme, il est l'un des pirates les plus recherchés du cyber-espace. À cheval entre deux mondes, Neo est assailli par d'étranges songes et des messages cryptés provenant d'un certain Morpheus. Celui-ci l'exhorte à aller au-delà des apparences et à trouver la réponse à la question qui hante constamment ses pensées : qu'est-ce que la Matrice ? Nul ne le sait, et aucun homme n'est encore parvenu à en percer les défenses. Mais Morpheus est persuadé que Neo est l’Élu, le libérateur mythique de l'humanité annoncé selon la prophétie. Ensemble, ils se lancent dans une lutte sans retour contre la Matrice et ses terribles agents...",
        "1999-03-30",
        135,
        "https://www.youtube.com/embed/8xx91zoASLY",
        false
    ),
    (
        "La Liste de Schindler",
        "Évocation des années de guerre d'Oskar Schindler, fils d'industriel d'origine autrichienne rentré à Cracovie en 1939 avec les troupes allemandes. Il va, tout au long de la guerre, protéger des juifs en les faisant travailler dans sa fabrique et en 1944 sauver 800 hommes et 300 femmes du camp d'extermination d'Auschwitz-Birkenau.",
        "1994-02-04",
        195,
        "https://www.youtube.com/embed/ONWtyxzl-GE",
        false
    ),
    (
        "Pulp Fiction",
        "L'odyssée sanglante et burlesque de petits malfrats dans la jungle d'Hollywood : deux petits tueurs, un dangereux gangster marié à une camée, un boxeur roublard, des prêteurs sur gages sadiques, un caïd élégant et dévoué, un dealer bon mari et de deux tourtereaux à la gâchette facile.",
        "1994-09-10",
        154,
        "https://www.youtube.com/embed/gjAJnzTPltc",
        false
    ),
    (
        "The Dark Knight",
        "Dans ce nouveau volet, Batman augmente les mises dans sa guerre contre le crime. Avec l'appui du lieutenant de police Jim Gordon et du procureur de Gotham, Harvey Dent, Batman vise à éradiquer le crime organisé qui pullule dans la ville. Leur association est très efficace mais elle sera bientôt bouleversée par le chaos déclenché par un criminel extraordinaire que les citoyens de Gotham connaissent sous le nom de Joker.",
        "2008-07-18",
        147,
        "https://www.youtube.com/embed/UMgb3hQCb08",
        false
    ),
    (
        "Le Parrain",
        "En 1945, à New York, les Corleone sont une des cinq familles de la mafia. Don Vito Corleone, \"parrain\" de cette famille, marie sa fille à un bookmaker. Sollozzo, \" parrain \" de la famille Tattaglia, propose à Don Vito une association dans le trafic de drogue, mais celui-ci refuse. Sonny, un de ses fils, y est quant à lui favorable. Afin de traiter avec Sonny, Sollozzo tente de faire tuer Don Vito, mais celui-ci en réchappe. Michael, le frère cadet de Sonny, recherche alors les commanditaires de l'attentat et tue Sollozzo et le chef de la police, en représailles. Michael part alors en Sicile, où il épouse Apollonia, mais celle-ci est assassinée à sa place. De retour à New York, Michael épouse Kay Adams et se prépare à devenir le successeur de son père...",
        "1972-03-15",
        177,
        "https://www.youtube.com/embed/bmtuIhesQWA",
        false
    ),
    (
        "Forrest Gump",
        "Forrest Gump est le symbole d'une époque, un candide dans une Amérique qui a perdu son innocence. Merveilleusement interprété par Tom Hanks, Forrest vit une série d'aventures, de l'état d'handicapé physique à celui de star du football, de héros du Vietnam au roi de la crevette, des honneurs de la Maison Blanche au bonheur d'une grande histoire d'amour. Son cœur dépasse les limites de son Q.I.",
        "1994-07-06",
        142,
        "https://www.youtube.com/embed/q2AP7dAeVhw",
        false
    ),
    (
        "Fight Club",
        "Le narrateur, sans identité précise, vit seul, travaille seul, dort seul, mange seul ses plateaux-repas pour une personne comme beaucoup d’autres personnes seules qui connaissent la misère humaine, morale et sexuelle. C’est pourquoi il va devenir membre du Fight club, un lieu clandestin où il va pouvoir retrouver sa virilité, l’échange et la communication. Ce club est dirigé par Tyler Durden, une sorte d’anarchiste entre gourou et philosophe qui prêche l’amour de son prochain.",
        "1999-10-15",
        139,
        "https://www.youtube.com/embed/rNfdHlm2RTc",
        false
    ),
    (
        "Le Silence des agneaux",
        "Un psychopathe connu sous le nom de Buffalo Bill sème la terreur dans le Middle West en kidnappant et en assassinant de jeunes femmes. Clarice Starling, une jeune agent du FBI, est chargée d'interroger l'ex-psychiatre Hannibal Lecter. Psychopathe redoutablement intelligent et porté sur le cannibalisme, Lecter est capable de lui fournir des informations concernant Buffalo Bill ainsi que son portrait psychologique. Mais il n'accepte de l'aider qu'en échange d'informations sur la vie privée de la jeune femme. Entre eux s'établit un lien de fascination et de répulsion.",
        "1991-02-14",
        118,
        "https://www.youtube.com/embed/Axm-r0M06qQ",
        false
    ),
    (
        "Django Unchained",
        "Dans le sud des États-Unis, deux ans avant la guerre de Sécession, le Dr King Schultz, un chasseur de primes allemand, fait l’acquisition de Django, un esclave qui peut l’aider à traquer les frères Brittle, les meurtriers qu’il recherche. Schultz promet à Django de lui rendre sa liberté lorsqu’il aura capturé les Brittle – morts ou vifs. Alors que les deux hommes pistent les dangereux criminels, Django n’oublie pas que son seul but est de retrouver Broomhilda, sa femme, dont il fut séparé à cause du commerce des esclaves… Lorsque Django et Schultz arrivent dans l’immense plantation du puissant Calvin Candie, ils éveillent les soupçons de Stephen, un esclave qui sert Candie et a toute sa confiance. Le moindre de leurs mouvements est désormais épié par une dangereuse organisation de plus en plus proche… Si Django et Schultz veulent espérer s’enfuir avec Broomhilda, ils vont devoir choisir entre l’indépendance et la solidarité, entre le sacrifice et la survie…",
        "2012-12-25",
        165,
        "https://www.youtube.com/embed/K2XjgsfzDrU",
        false
    ),
    (
        "Seven",
        "Pour conclure sa carrière, l'inspecteur Somerset, vieux flic blasé, tombe à sept jours de la retraite sur un criminel peu ordinaire. John Doe, c'est ainsi que se fait appeler l'assassin, a décidé de nettoyer la société des maux qui la rongent en commettant sept meurtres basés sur les sept péchés capitaux : la gourmandise, l'avarice, la paresse, l'orgueil, la luxure, l'envie et la colère.",
        "1995-09-22",
        130,
        "https://www.youtube.com/embed/BLY4treE0XU",
        false
    ),
    (
        "Joker",
        "Dans les années 1980, à Gotham City, Arthur Fleck, un humoriste de stand-up raté, bascule dans la folie et devient le Joker.",
        "2019-10-04",
        122,
        "https://www.youtube.com/embed/_LUWnjT3iks",
        false
    ),
    (
        "Retour vers le futur",
        "1985. Le jeune Marty McFly mène une existence anonyme auprès de sa petite amie Jennifer, seulement troublée par sa famille en crise et un proviseur qui serait ravi de l'expulser du lycée. Ami de l'excentrique professeur Emmett Brown, il l'accompagne un soir tester sa nouvelle expérience : le voyage dans le temps via une DeLorean modifiée. La démonstration tourne mal : des trafiquants d'armes débarquent et assassinent le scientifique. Marty se réfugie dans la voiture et se retrouve transporté en 1955. Là, il empêche malgré lui la rencontre de ses parents, et doit tout faire pour les remettre ensemble, sous peine de ne pouvoir exister...",
        "1985-07-03",
        116,
        "https://www.youtube.com/embed/cU5BREZ9ke0",
        false
    ),
    (
        "Gladiator",
        "Le général romain Maximus est le plus fidèle soutien de l'empereur Marc Aurèle, qu'il a conduit de victoire en victoire avec une bravoure et un dévouement exemplaires. Jaloux du prestige de Maximus, et plus encore de l'amour que lui voue l'empereur, le fils de Marc Aurèle, Commode, s'arroge brutalement le pouvoir, puis ordonne l'arrestation du général et son exécution. Maximus échappe à ses assassins mais ne peut empêcher le massacre de sa famille. Capturé par un marchand d'esclaves, il devient gladiateur et prépare sa vengeance.",
        "2000-05-01",
        155,
        "https://www.youtube.com/embed/Nz5CnNHnpO8",
        false
    );


INSERT INTO genre
(name)
VALUES
('Crime'),
('Thriller'),
('Drame'),
('Western'),
('Guerre'),
('Comedie'),
('Science-fiction'),
('Aventure'),
('Action');

INSERT into movies_genre 
(movies_id, genre_id)
VALUES
(1, 7),
(1, 8),
(1, 9),
(2,8),
(2,7),
(2,3),
(3,9),
(3,7),
(4,3),
(4,5),
(5,2),
(6,2),
(6,9),
(7,3),
(7,1),
(8, 3),
(8, 6),
(9, 3),
(10, 3),
(10, 2),
(11, 3),
(11, 4),
(12, 1),
(12, 2),
(13, 1),
(13, 2),
(14, 8),
(14, 6),
(15, 9),
(15, 3);