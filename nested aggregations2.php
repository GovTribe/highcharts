{
  "size": 1,
  "_source": [
    "name"
  ],
  "query": {
    "match_all": {}
  },
  "aggs": {
    "agencyNames": {
      "nested": {
        "path": "agencies"
      },
      "aggs": {
        "agencyName": {
          "terms": {
            "field": "agencies.name",
            "size": 10
          },
          "aggs": {
            "agencies_to_projects_setAside": {
              "reverse_nested": {},
              "aggs": {
                "setAsideType": {
                  "terms": {
                    "field": "setAsideType",
                    "size": 15
                  }
                }
              }
            },
            "agencies_to_projects_awardValue": {
              "reverse_nested": {},
              "aggs": {
                "awardValueStats": {
                  "stats": {
                    "field": "awardValueNumeric"
                  }
                }
              }
            }
          }
        }
      }
    }
  }
}