# unisQL
Make APIs secured with JWT barrier Token

it will return data in Json
HIT POST REQUEST TO  :datas.php 

{
  "query": {
    "get": "*",
    "conditions": {
      "perform": " OR  ",
      "LIKE": true,
      "on": {
        "image_name": "KV"
      }
    },
    "order": {
      "field": "id",
      "by": "ASC"
    },
    "limit": {
      "page_size": "0",
      "offset": "1"
    }
  }
}
