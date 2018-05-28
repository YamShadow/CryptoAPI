# Crypto API
Projet du cours de AJAX/API/JSON.

Intervenant : .

Groupe :
- Mathieu NIBAS
- Dylan 

## Getting Started
PHP 7.x requis.  


## Fonctionnalités

* Feed de la base de données
* Cryptomonnaie : 
    * Affichages des monnaies
    * Affichage de l'historique
    * Affichage des echanges
    * Affichage des top

## Routes de l'api en GET
### /
**DESCRIPTION** Liste des routes disponibles

    PARAMETRES D'ENTREE

    PARAMETRE DE SORTE
    JSON {
        'Route': {
            '/': 'Liste des routes disponibles',
            "cryptocurrencies":"/cryptocurrencies",
            "cryptocurrencies_id":"/cryptocurrencies/id/{number}",
            "cryptocurrencies_symbol":"/cryptocurrencies/symbol/{String}",
            "echange":"/echanges",
            "echange_id":"/echanges/id/{number}",
            "echange_id_limit":"/echanges/id/{number}/limit/{number}",
            "echange_id_date":"/echanges/id/{number}/date/{date}",
            "echange_symb":"/echanges/symbol/{String}",
            "echange_symb_limit":"/echanges/symbol/{String}/limit/{number}",
            "echange_symb_date":"/echanges/symbol/{String}/date/{date}",
            "echange_top":"/echanges/top/{1h|24h|7d}",
            "echange_top_limit":"/echanges/top/{1h|24h|7d}/limit/{number}",
            "echange_top_date":"/echanges/top/{1h|24h|7d}/date/{date}",
            "echange_top_date_limit":"/echanges/top/{1h|24h|7d}/date/{date}/limit/{number}",
            "historiques":"/historiques",
            "historiques_id":"/historiques/id/{number}",
            "historiques_id_limit":"/historiques/id/{number}/limit/{number}",
            "historiques_id_date":"/historiques/id/{number}/date/{date}",
            "historiques_id_date_limit":"/historiques/id/{number}/date/{date}/limit/{number}",
            "historiques_symb":"/historiques/symbol/{String}",
            "historiques_symb_limit":"/historiques/symbol/{String}/limit/{number}",
            "historiques_symb_date":"/historiques/symbol/{String}/date/{date}"
            "historiques_symb_date_limit":"/historiques/symbol/{String}/date/{date}/limit/{number}",
        }
    }

### /cryptocurrencies
**DESCRIPTION** Retourne toutes les crypto-monnaies

    PARAMETRES D'ENTREE

    PARAMETRE DE SORTE
    JSON {
        success : boolean,
        reponses : Cryptocurrencies, 
        errors : null
    }

### /cryptocurrencies/id/:id
**DESCRIPTION** Retourne une crypto-monnaies par rapport à son ID

    PARAMETRES D'ENTREE
    @id      : int

    PARAMETRE DE SORTE
    JSON {
        success : boolean,
        reponses : Cryptocurrencie, 
        errors : null     
    }

### /cryptocurrencies/symbol/:symbol
**DESCRIPTION** Retourne une crypto-monnaies par rapport à son symbol

    PARAMETRES D'ENTREE
    @symbol      : String

    PARAMETRE DE SORTE
    JSON {
        success : boolean,
        reponses : Cryptocurrencie, 
        errors : null     
    }

### /echanges
**DESCRIPTION** Affiche les routes des echanges

    PARAMETRES D'ENTREE

    PARAMETRE DE SORTE
    JSON {
       'Route': {
            "echange_id":"/echanges/id/{number}",
            "echange_id_limit":"/echanges/id/{number}/limit/{number}",
            "echange_id_date":"/echanges/id/{number}/date/{date}",
            "echange_symb":"/echanges/symbol/{String}",
            "echange_symb_limit":"/echanges/symbol/{String}/limit/{number}",
            "echange_symb_date":"/echanges/symbol/{String}/date/{date}",
            "echange_top":"/echanges/top/{1h|24h|7d}",
            "echange_top_limit":"/echanges/top/{1h|24h|7d}/limit/{number}",
            "echange_top_date":"/echanges/top/{1h|24h|7d}/date/{date}",
            "echange_top_date_limit":"/echanges/top/{1h|24h|7d}/date/{date}/limit/{number}",
        }
    }

###  /echanges/id/:id
**DESCRIPTION** Affiche les echanges d'une crypto-monnaie (limit: 50)

    PARAMETRES D'ENTREE
    @id      : int

    PARAMETRE DE SORTE
    JSON {
        success : boolean,
        reponses : echange, 
        errors : null     
    }

###  /echanges/id/:id/limit/:limit
**DESCRIPTION** Affiche les echanges d'une crypto-monnaie avec une limite variable

    PARAMETRES D'ENTREE
    @id         : int
    @limit      : int

    PARAMETRE DE SORTE
    JSON {
        success : boolean,
        reponses : echange, 
        errors : null     
    }

###  /echanges/id/:id/date/:date
**DESCRIPTION** Affiche les echanges d'une crypto-monnaie en fonction de la date (limit: 50)

    PARAMETRES D'ENTREE
    @id        : int
    @date      : date

    PARAMETRE DE SORTE
    JSON {
        success : boolean,
        reponses : echange, 
        errors : null     
    }

###  /echanges/id/:id/date/:date/limit/:limit
**DESCRIPTION** Affiche les echanges d'une crypto-monnaie en fonction de la date avec une limite variable

    PARAMETRES D'ENTREE
    @id         : int
    @date       : date
    @limit      : int

    PARAMETRE DE SORTE
    JSON {
        success : boolean,
        reponses : echange, 
        errors : null     
    }

###  /echanges/symbol/:symbol
**DESCRIPTION** Affiche les echanges d'une crypto-monnaie (limit: 50)

    PARAMETRES D'ENTREE
    @symbol      : int

    PARAMETRE DE SORTE
    JSON {
        success : boolean,
        reponses : echange, 
        errors : null     
    }

###  /echanges/symbol/:symbol/limit/:limit
**DESCRIPTION** Affiche les echanges d'une crypto-monnaie avec une limite variable

    PARAMETRES D'ENTREE
    @symbol     : int
    @limit      : int

    PARAMETRE DE SORTE
    JSON {
        success : boolean,
        reponses : echange, 
        errors : null     
    }

###  /echanges/symbol/:symbol/date/:date
**DESCRIPTION** Affiche les echanges d'une crypto-monnaie en fonction de la date (limit: 50)

    PARAMETRES D'ENTREE
    @symbol      : int
    @date        : date

    PARAMETRE DE SORTE
    JSON {
        success : boolean,
        reponses : echange, 
        errors : null     
    }

###  /echanges/symbol/:symbol/date/:date/limit/:limit
**DESCRIPTION** Affiche les echanges d'une crypto-monnaie en fonction de la date avec une limite variable

    PARAMETRES D'ENTREE
    @symbol        : int
    @date          : date
    @limit         : int

    PARAMETRE DE SORTE
    JSON {
        success : boolean,
        reponses : echange, 
        errors : null     
    }

###  /echanges/top/:top
**DESCRIPTION** Affiche le top des echanges des crypto-monnaies par rapport à 1h, 24h, 7d à la date actuelle (limit: 50)

    PARAMETRES D'ENTREE
    @top        : String

    PARAMETRE DE SORTE
    JSON {
        success : boolean,
        reponses : echanges, 
        errors : null     
    }

###  /echanges/top/:top/limit/:limit
**DESCRIPTION** Affiche le top des echanges des crypto-monnaies par rapport à 1h, 24h, 7d à la date actuelle avec limite variable

    PARAMETRES D'ENTREE
    @top          : String
    @limit        : int

    PARAMETRE DE SORTE
    JSON {
        success : boolean,
        reponses : echanges, 
        errors : null     
    }

###  /echanges/top/:top/date/:date
**DESCRIPTION** Affiche le top des echanges des crypto-monnaies par rapport à 1h, 24h, 7d par rapport à une date

    PARAMETRES D'ENTREE
    @top         : String
    @date        : date

    PARAMETRE DE SORTE
    JSON {
        success : boolean,
        reponses : echanges, 
        errors : null     
    }

###  /echanges/top/:top/date/:date/limit/:limit
**DESCRIPTION** Affiche le top des echanges des crypto-monnaies par rapport à 1h, 24h, 7d par rapport à une date avec limite variable

    PARAMETRES D'ENTREE
    @top          : String
    @date         : date
    @limit        : int

    PARAMETRE DE SORTE
    JSON {
        success : boolean,
        reponses : echanges, 
        errors : null     
    }

###  /historiques
**DESCRIPTION** Affiche les routes d'historiques

    PARAMETRES D'ENTREE

    PARAMETRE DE SORTE
    JSON {
        'Route': {
            "historiques_id":"/historiques/id/{number}",
            "historiques_id_limit":"/historiques/id/{number}/limit/{number}",
            "historiques_id_date":"/historiques/id/{number}/date/{date}",
            "historiques_id_date_limit":"/historiques/id/{number}/date/{date}/limit/{number}",
            "historiques_symb":"/historiques/symbol/{String}",
            "historiques_symb_limit":"/historiques/symbol/{String}/limit/{number}",
            "historiques_symb_date":"/historiques/symbol/{String}/date/{date}"
            "historiques_symb_date_limit":"/historiques/symbol/{String}/date/{date}/limit/{number}",
        }
    }

###  /historiques/id/:id
**DESCRIPTION** Affiche l'histoire d'une crypto-monnaie (limit: 50)

    PARAMETRES D'ENTREE
    @id         : int

    PARAMETRE DE SORTE
    JSON {
        success : boolean,
        reponses : historiques, 
        errors : null     
    }
    
###  /historiques/id/:id/limit/:limit
**DESCRIPTION** Affiche l'histoire d'une crypto-monnaie avec une date avec une limite variable

    PARAMETRES D'ENTREE
    @id          : int
    @limit       : int

    PARAMETRE DE SORTE
    JSON {
        success : boolean,
        reponses : historiques, 
        errors : null     
    }

###  /historiques/id/:id/date/:date
**DESCRIPTION** Affiche l'histoire d'une crypto-monnaie avec une date (limit: 50)

    PARAMETRES D'ENTREE
    @id         : int
    @date       : date

    PARAMETRE DE SORTE
    JSON {
        success : boolean,
        reponses : historiques, 
        errors : null     
    }

###  /historiques/id/:id/date/:date/limit/:limit
**DESCRIPTION** Affiche l'histoire d'une crypto-monnaie avec une date avec une limite variable

    PARAMETRES D'ENTREE
    @id         : int
    @date       : date
    @limit      : int

    PARAMETRE DE SORTE
    JSON {
        success : boolean,
        reponses : historiques, 
        errors : null     
    }

###  /historiques/symbol/:symbol
**DESCRIPTION** Affiche l'histoire d'une crypto-monnaie (limit: 50)

    PARAMETRES D'ENTREE
    @symbol      : String

    PARAMETRE DE SORTE
    JSON {
        success : boolean,
        reponses : historiques, 
        errors : null     
    }
    
###  /historiques/symbol/:symbol/limit/:limit
**DESCRIPTION** Affiche l'histoire d'une crypto-monnaie avec une date avec une limit variable

    PARAMETRES D'ENTREE
    @symbol      : String
    @limit       : int

    PARAMETRE DE SORTE
    JSON {
        success : boolean,
        reponses : historiques, 
        errors : null     
    }

###  /historiques/symbol/:symbol/date/:date
**DESCRIPTION** Affiche l'histoire d'une crypto-monnaie avec une date (limit: 50)

    PARAMETRES D'ENTREE
    @symbol      : String
    @date       : date

    PARAMETRE DE SORTE
    JSON {
        success : boolean,
        reponses : historiques, 
        errors : null     
    }

###  /historiques/symbol/:symbol/date/:date/limit/:limit
**DESCRIPTION** Affiche l'histoire d'une crypto-monnaie avec une date avec une limite variable

    PARAMETRES D'ENTREE
    @symbol     : String
    @date       : date
    @limit      : int

    PARAMETRE DE SORTE
    JSON {
        success : boolean,
        reponses : historiques, 
        errors : null     
    }

## TODO

Faire toute les routes avec date ( sauf top )