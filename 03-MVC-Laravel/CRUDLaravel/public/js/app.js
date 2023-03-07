function confirmarEliminar() {
    var x = confirm("Estas seguro de Eliminar?");
    if (x){
        return true;
    }
        
    else{
        return false;
    }
}


let api_key = 'api_key=ea1da4e62020cb544cbc4f3c8cdce851';
let ListaPeliculas;
let win = $(window);
let contpage = 1;
let img = 'https://image.tmdb.org/t/p/w500/'

function addPelicula(ListaPeliculas) {

    let list = document.getElementsByClassName("list")[0];
    let ul = document.createElement("ul");

    for (let i = 0; i < ListaPeliculas.results.length; i++) {
        console.log(ListaPeliculas.results[i]);
        console.log(ListaPeliculas.results[i].title);
        console.log(ListaPeliculas.results[i].poster_path);
        console.log(ListaPeliculas.results[i].release_date);

        $('#contenido').append('<div class="card col-lg-3 col-md-4 col-sm-6 col-xs-12 col-12 div_contenido" style="height: 400px; display: inline-flex;">\n' +
        '  <img class="card-img-top" style="height: 300px; width: 100%;" src="' + img + ListaPeliculas.results[i].poster_path + '" onerror="noCargada(this)">\n' +
        '  <div class="card-body">\n' +
        '    <a class="card-title">' + ListaPeliculas.results[i].title + '</a>\n' +
        '    <p class="card-text">Año: ' + ListaPeliculas.results[i].release_date + '</p>\n' +
        '</div>')
    }

    win.scroll(function () {
        if ($(document).height() - win.height() <= (win.scrollTop() + 80)) {
            contpage++;
            $.ajax({
                url: "https://api.themoviedb.org/3/search/movie?" + api_key + "&query=" + $('#pelicula').val() + "&type=movie&page=" + contpage ,
                success: function (denuevo) {
                    addPelicula(denuevo);
                }
            });
        }
    });
}
function searchPeli(){
    $.ajax({
    type: 'GET',
    url: "https://api.themoviedb.org/3/search/movie?" + api_key + "&query=" + $('#pelicula').val(),
    dataType: 'json',
    success: function(data) {
      ListaPeliculas = data;
      addPelicula(ListaPeliculas);
    },
    error: function (data) {
        console.log(data, "NO ha ido bien");
    }
  });
}
/*
{
    "page": 1,
    "results": [
        {
            "adult": false,
            "backdrop_path": "/rtRlUcs1GxWcdLgkuZhd8y314tg.jpg",
            "genre_ids": [
                35,
                18,
                10749
            ],
            "id": 5781,
            "original_language": "fr",
            "original_title": "Cet obscur objet du désir",
            "overview": "After dumping a bucket of water on a beautiful young woman from the window of a train car, wealthy Frenchman Mathieu, regales his fellow passengers with the story of the dysfunctional relationship between himself and the young woman in question, a fiery 19-year-old flamenco dancer named Conchita. What follows is a tale of cruelty, depravity and lies -- the very building blocks of love.",
            "popularity": 16.751,
            "poster_path": "/9iUdC4dftkjYSBUJq5DAxC6WqB9.jpg",
            "release_date": "1977-08-17",
            "title": "That Obscure Object of Desire",
            "video": false,
            "vote_average": 7.467,
            "vote_count": 301
        },
        {
            "adult": false,
            "backdrop_path": null,
            "genre_ids": [
                10749,
                18
            ],
            "id": 481422,
            "original_language": "it",
            "original_title": "Oggetto sessuale",
            "overview": "Laura is a sex educator hired to teach sex in exchange for money. A rich family hires her to give sex education to their asocial son.",
            "popularity": 6.048,
            "poster_path": "/rDFNd5x2Pq0kj4Yyh2v9GPZDKtw.jpg",
            "release_date": "1987-01-01",
            "title": "Laura: A Sexual Object",
            "video": false,
            "vote_average": 3,
            "vote_count": 2
        },
        {
            "adult": false,
            "backdrop_path": "/uDdTU2WcVr7KiDLBcgLvI5RiHdU.jpg",
            "genre_ids": [
                99,
                18,
                9648
            ],
            "id": 93553,
            "original_language": "th",
            "original_title": "ดอกฟ้าในมือมาร",
            "overview": "Apichatpong Weerasethakul brought an appetite for experimen­tation to Thai cinema with his debut feature, an uncategorizable work that refracts documentary impressions of his homeland through the surrealist concept of the exquisite corpse game. Enlisting locals to contribute improvised narration to a simple tale, Apichatpong charts the collective construction of the fiction as each new encounter imbues it with unpredictable shades of fantasy and pathos.",
            "popularity": 3.268,
            "poster_path": "/tRaTxXUkHRqo4HOmzaCuvxXnH3E.jpg",
            "release_date": "2000-11-08",
            "title": "Mysterious Object at Noon",
            "video": false,
            "vote_average": 6.348,
            "vote_count": 33
        },
        {
            "adult": false,
            "backdrop_path": null,
            "genre_ids": [
                35
            ],
            "id": 982586,
            "original_language": "fr",
            "original_title": "La Femme Objet",
            "overview": "",
            "popularity": 0.6,
            "poster_path": "/AjtWZXTyMW55yzM9S4TZ0bbqWRk.jpg",
            "release_date": "2022-06-01",
            "title": "The Object Woman",
            "video": false,
            "vote_average": 5.5,
            "vote_count": 1
        },
        {
            "adult": false,
            "backdrop_path": "/AeFTYQb20tf12yLmZQIQzz0s57X.jpg",
            "genre_ids": [
                18,
                27,
                10749,
                53
            ],
            "id": 16973,
            "original_language": "en",
            "original_title": "Love Object",
            "overview": "The twisted tale of Kenneth, socially insecure technical writer who forms an obsessive relationship with \"Nikki\", an anatomically accurate silicone sex doll he orders over the Internet.",
            "popularity": 6.898,
            "poster_path": "/cUXaPxe7hyksghZYcXyQ9UxSTT4.jpg",
            "release_date": "2003-04-05",
            "title": "Love Object",
            "video": false,
            "vote_average": 5.8,
            "vote_count": 65
        },
        {
            "adult": false,
            "backdrop_path": null,
            "genre_ids": [
                35
            ],
            "id": 823894,
            "original_language": "en",
            "original_title": "That Really Obscure Object of Desire",
            "overview": "A short personal documentary about a man’s obsession with his 1928 Model A Ford.",
            "popularity": 1.09,
            "poster_path": "/dFo664A32kmB8JB8k04xstUN5T4.jpg",
            "release_date": "1989-12-31",
            "title": "That Really Obscure Object of Desire",
            "video": false,
            "vote_average": 0,
            "vote_count": 0
        },
        {
            "adult": false,
            "backdrop_path": "/idXIavvL3uwLgaBT3pWSzP3SV47.jpg",
            "genre_ids": [
                18
            ],
            "id": 250673,
            "original_language": "pt",
            "original_title": "Karina, Objeto do Prazer",
            "overview": "A stripper is arrested for killing her gigolo who exploited her as a prostitute under the name of Karina. Her despair turns to ardent passion when she meets a lady lawyer who promises her that she will be able to get her out of jail very quickly. But both ladies will have to fight an outlaw who will do whatever he can to possess Karina.",
            "popularity": 1.285,
            "poster_path": "/jrbdUeIbzaq9ytAaEAi67w3js4B.jpg",
            "release_date": "1982-09-13",
            "title": "Karina, Object of Passion",
            "video": false,
            "vote_average": 3.9,
            "vote_count": 7
        },
        {
            "adult": false,
            "backdrop_path": "/c2fjZJxyaPd2YRYs4Ob4kL8sTjn.jpg",
            "genre_ids": [
                18
            ],
            "id": 1080572,
            "original_language": "ar",
            "original_title": "مفعول به",
            "overview": "A traditional Egyptian family is celebrating the birth of their newest child a baby doll. The doll grows up and is undergoing genital mutilation and is getting ready to get married. Through the exploration of the relationship between sound and moving pictures “Object” deconstructs the childhood of a common Egyptian girl.",
            "popularity": 0.739,
            "poster_path": "/tk6EFmCGuDJ7UoCozIMxYqQokA6.jpg",
            "release_date": "2022-10-11",
            "title": "Object",
            "video": false,
            "vote_average": 0,
            "vote_count": 0
        },
        {
            "adult": false,
            "backdrop_path": "/1U8DAdulaZMBqdmr0dDcsSRv1GK.jpg",
            "genre_ids": [
                35,
                18,
                10749
            ],
            "id": 17127,
            "original_language": "en",
            "original_title": "The Object of My Affection",
            "overview": "A pregnant New York social worker begins to develop romantic feelings for her gay best friend, and decides she'd rather raise her child with him, much to the dismay of her overbearing boyfriend.",
            "popularity": 13.078,
            "poster_path": "/7LlWOHxcDu0Qsf70LnKwMYV63kb.jpg",
            "release_date": "1998-04-17",
            "title": "The Object of My Affection",
            "video": false,
            "vote_average": 5.834,
            "vote_count": 268
        },
        {
            "adult": false,
            "backdrop_path": null,
            "genre_ids": [
                878
            ],
            "id": 985880,
            "original_language": "fr",
            "original_title": "L'objet",
            "overview": "A mysterious object from the 20th century is being studied by an archeologist from the future.",
            "popularity": 0.6,
            "poster_path": null,
            "release_date": "1974-01-01",
            "title": "The Object",
            "video": false,
            "vote_average": 0,
            "vote_count": 0
        },
        {
            "adult": false,
            "backdrop_path": "/70y1VF0gpoJHyToAITfXA0GKIdt.jpg",
            "genre_ids": [
                18,
                35,
                80
            ],
            "id": 88818,
            "original_language": "en",
            "original_title": "The Object of Beauty",
            "overview": "American couple Jake and Tina are living in an expensive London hotel above their means, incurring a sizeable debt. When they are asked to pay a lavish dinner bill and Jake's card is declined, he suggests they sell Tina's tiny, expensive Henry Moore sculpture to cover the debt. After they hatch a scheme to claim the sculpture was stolen in order to collect insurance on it, the sculpture mysteriously goes missing.",
            "popularity": 6.789,
            "poster_path": "/vtxTzSrjCDH7Ray4RK8FPUrrlSy.jpg",
            "release_date": "1991-04-12",
            "title": "The Object of Beauty",
            "video": false,
            "vote_average": 5.4,
            "vote_count": 27
        },
        {
            "adult": false,
            "backdrop_path": null,
            "genre_ids": [
                18
            ],
            "id": 899532,
            "original_language": "ru",
            "original_title": "Объект 12",
            "overview": "The story of the wife of Vyacheslav Molotov, a Russian revolutionary, Soviet political, state and party figure, chairman of the Council of People's Commissars of the USSR in 1930-1941, Minister of Foreign Affairs of the USSR in 1939-1949, 1953-1956. The film is about love, friendship, devotion, human helplessness before the fate and moloch of great historical processes.",
            "popularity": 0.6,
            "poster_path": "/yXUcxaE8GvZbwVmrWNPxBSvu8Ct.jpg",
            "release_date": "2020-11-01",
            "title": "Object 12",
            "video": false,
            "vote_average": 0,
            "vote_count": 0
        },
        {
            "adult": false,
            "backdrop_path": "/942OF3hFFZFroHMnjn2il0n3XSJ.jpg",
            "genre_ids": [],
            "id": 466881,
            "original_language": "pt",
            "original_title": "Objeto/Sujeito",
            "overview": "He, Subject needs to deal with the Object. On this journey, Object becomes Subject.",
            "popularity": 0.6,
            "poster_path": "/rpXf431gMs1t1ECtB3lbySlsbuW.jpg",
            "release_date": "2017-08-17",
            "title": "Object/Subject",
            "video": false,
            "vote_average": 10,
            "vote_count": 1
        },
        {
            "adult": false,
            "backdrop_path": null,
            "genre_ids": [],
            "id": 836352,
            "original_language": "zh",
            "original_title": "怀疑物体",
            "overview": "Multimedia artist Jiang Zhi's second video art film. It's been confirmed by Jiang Zhi to be a lost film.",
            "popularity": 0.6,
            "poster_path": null,
            "release_date": "1997-10-21",
            "title": "Suspected Object",
            "video": false,
            "vote_average": 0,
            "vote_count": 0
        },
        {
            "adult": false,
            "backdrop_path": null,
            "genre_ids": [
                16
            ],
            "id": 795524,
            "original_language": "ru",
            "original_title": "Объект №9078",
            "overview": "In deep space, living matter is recorded on an asteroid. And a rover robot is sent there with a research mission.",
            "popularity": 0.6,
            "poster_path": null,
            "release_date": "2020-10-17",
            "title": "Object № 9078",
            "video": false,
            "vote_average": 0,
            "vote_count": 0
        },
        {
            "adult": false,
            "backdrop_path": null,
            "genre_ids": [],
            "id": 606860,
            "original_language": "vi",
            "original_title": "Của rơi",
            "overview": "Thang is a Hanoi intellectual and graduates from university with high distinction causing his former teacher, Dao, to invite him to work in a mathematics institute of odd algorithms. He has problems because of his personality and refuses to give up his mathematical perspectives. He distinguishes himself as a person of integrity, which also causes problems for him.",
            "popularity": 1.181,
            "poster_path": "/p0JThL8sMBXNyKU0S2KvPsKRTGv.jpg",
            "release_date": "2003-02-08",
            "title": "Missing Object",
            "video": false,
            "vote_average": 6,
            "vote_count": 3
        },
        {
            "adult": false,
            "backdrop_path": null,
            "genre_ids": [
                18
            ],
            "id": 950814,
            "original_language": "mk",
            "original_title": "Мистериозниот предмет",
            "overview": "Film about the power of evil and temptation, about greed and the frailty of a friendship that leads two friends into self-destruction.",
            "popularity": 0.6,
            "poster_path": null,
            "release_date": "1982-01-01",
            "title": "The Mysterious Object",
            "video": false,
            "vote_average": 0,
            "vote_count": 0
        },
        {
            "adult": false,
            "backdrop_path": null,
            "genre_ids": [
                99
            ],
            "id": 303746,
            "original_language": "ru",
            "original_title": "Тимур Новиков. Ноль объект",
            "overview": "Timur Novikov: Zero Object positions the late artist Timur Novikov as protagonist in this exploration of underground art from St Petersburg. As well as providing a historical overview of the 1980s-1990s, the film features iconic figures in St Petersburg’s underground scene: cult rocker Victor Tsoi, and artists Georgy Guryanov, Vladislav Mamyshev-Monroe and Sergey ‘Africa’ Bugaev, among others. From beginning to end, it’s a manifesto for personal and artistic freedom in a forbidding political climate.",
            "popularity": 0.6,
            "poster_path": null,
            "release_date": "2014-01-01",
            "title": "Timur Novikov: Zero Object",
            "video": false,
            "vote_average": 5.7,
            "vote_count": 3
        },
        {
            "adult": false,
            "backdrop_path": "/qauF6dMSijEeycP968U0rd7cbXV.jpg",
            "genre_ids": [
                99
            ],
            "id": 410076,
            "original_language": "fr",
            "original_title": "La Leçon de choses ou Magritte",
            "overview": "The surrealist painter René Magritte questions the objective reality and emphasizes the arbitrariness of the relationship between an object, its image and its name: the evocation of mystery consists of images of familiar things gathered or transformed in such a way that they no longer conform to our ideas, whether naive or wise.",
            "popularity": 0.706,
            "poster_path": "/rdZWoRJFUHmWCuvq46mYxbCtPHp.jpg",
            "release_date": "1960-01-01",
            "title": "Magritte or the Object Lesson",
            "video": false,
            "vote_average": 5.6,
            "vote_count": 10
        },
        {
            "adult": false,
            "backdrop_path": null,
            "genre_ids": [
                99,
                18
            ],
            "id": 969206,
            "original_language": "zh",
            "original_title": "江湖说书",
            "overview": "In Luxi, a county in southeastern Yunnan Province, someone’s corpse was burned. The parents of the murdered man don’t know the truth and have been waiting for their son to return home. A nomadic female poet comes to Luxi to shoot a documentary and hears about the story. A few days later, she leaves the man she met on the road without saying goodbye, and the reason is written into a verse: \"One person blocks the wind so that other clouds can see the rain in the afterlife. We’ve been stuck in it.” The vicissitude of life can be sensed from the ancient street in Luxi.",
            "popularity": 0.6,
            "poster_path": "/jSc6589u13qDcNBzukgBuM3MRJc.jpg",
            "release_date": "2020-03-03",
            "title": "Mysterious Object At Noon",
            "video": false,
            "vote_average": 0,
            "vote_count": 0
        }
    ],
    "total_pages": 6,
    "total_results": 101
}*/