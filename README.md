## About VICTRy Is Mine

Available at https://whyshouldihirechris.com/

Just a quick demo of pulling data from the github search API
- [REST API v3](https://developer.github.com/v3/).
- [Search](https://developer.github.com/v3/search/).


## Fields of Interest
- id,
- name,
- html_url,
- created_at,
- pushed_at,
- description,
- stargazers_count

## Mechanics
- The request is sent using Guzzle
- The DB used was Mysql (origianlly I had it setup using PostGreSQL on my machine, but changed it per the instructions)
- Only the first 100 records are being pulled but more could be by increasing the page size and/or looping through pages
- The pull is initiated by clicking the pull link(s) (nothing too fancy, just a redirect after the data is pulled)
- No authetication is being done on the github api, so the limit is [10 queries a minute](https://developer.github.com/v3/search/#rate-limit).
- The data is fetched from the db using the model and sorted descending by stargazers_count.
- The data is attached to the view and returned to the user.
- The list is using bootstrap cards for an accordion effect.

