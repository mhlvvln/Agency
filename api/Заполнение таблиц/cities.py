regional_centers = ['Донецк', 'Севастополь',
                    'Луганск', 'Симферополь'
                    'Архангельск', 'Астрахань',
                    'Белгород', 'Брянск',
                    'Владимир', 'Волгоград',
                    'Вологда', 'Воронеж',
                    'Иваново', 'Иркутск',
                    'Калининград', 'Калуга',
                    'Кемерово', 'Киров',
                    'Кострома', 'Курган',
                    'Курск', 'Липецк',
                    'Магадан', 'Мурманск',
                    'Нижний Новгород', 'Новосибирск',
                    'Омск', 'Орел',
                    'Оренбург', 'Пенза',
                    'Псков', 'Ростов-на-Дону',
                    'Рязань', 'Самара',
                    'Саратов','Смоленск',
                    'Тамбов','Тверь',
                    'Томск','Тула',
                    'Тюмень','Ульяновск',
                    'Челябинск','Ярославль']

access_token = "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOi8vYW55LXNpdGUub3JnIiwiYXVkIjoiaHR0cDovL2FueS1zaXRlLm9yZyIsImlhdCI6MTY4MDI3NDQ3MCwibmJmIjoxNjgwMjc0NDcwLCJkYXRhIjp7ImlkIjpudWxsLCJsYXN0bmFtZSI6bnVsbCwiZW1haWwiOiJtaGx2dmxuQGdtYWlsLmNvbSIsImFkbWluIjpmYWxzZX19.Tl5bE3uSkLjCJiJCsYb_X5pbXvKBkQoPc_lerVyEROw"
import requests

print(len(regional_centers))
for i in regional_centers:
    print(requests.get("http://agency/api/cities.add",
            params=[('access_token', access_token), ('name', i)]))
