# Hello There!

I have totally mismanaged my time, and underestimated the task. So, i prefered to concetrate to the GET part only.

## Installation

I have user Lumen Framework. In every case, i would need a router, Carbon and so on, so a microFramework was a good middle ground.

To run it we will use laradock. It is an overkill of course, but "better safe than sorry". 
Being in the root folder of the project, type this in your terminal. 



```bash
cp .env.example .env
git submodule add https://github.com/Laradock/laradock.git
cd laradock
cp env-example .env
docker-compose up -d nginx
```

To enter the workspace container 
```bash
docker-compose exec --user=laradock workspace bash
```

And then:
```bash
composer install
php artisan key:generate
```



You can hit the api by typing localhost in your browser, or Postman!

http://localhost/itineraries


## Testing

We can use the phpunit test suite of Lumen. 

Being inside the container, type

```bash
phpunit
```





## Notes

- At the first version of my code, when it was just working, i tried to test, but mocking units was a little trouble (like the cases in the interview i described). So i decided to invest in refactoring until my time expired. 
- The same goes for error handling and exceptions. I saw that i needed more classy code to have more specific handling.
- Mapping the resources to unique keys was challenging for me. I do not know if i had to store them on db or on something like redis. I have not seen this case before. I suppose it has to do with the UUID thing.

If i was to continue this as a project, i would recommend to myself:

- I think that Guzzle client would need a singleton implementation. 
- Many things should go to config files (or in a db). Base uri's, providers
- I would ask more about the specs, some things about the ports were really confusing to me, but as i said i mismanaged everything. 
 - I would search more about Fractal package. But i decided to make my own attempt of a transformer. 
 - Instead of handling just raw arrays, i would create Classes for Trip, Price etc. 


I did not gave my best. But in every case, i really enjoyed the assignment. It boost my mind to think more clearly and to ask myself things that i do not have the "luxury" to do in my job position. The specs were really amazing, and helped me to think more abstractly!

Thank you very much. 
I am waiting for your feedback. 
