from random import randint, choice
import string
import requests
import time
from json import loads, load

def returnPhoto(gender: int):
    if gender == 1:
        g = "m"
    else:
        g = "w"
    val = randint(1, 6)
    with open(f'photos/{g}/{str(val)}.jpg', 'rb') as f:
        # Читаем данные из файла в бинарном режиме
        image_data = f.read()

    return (f'photos/{g}/{str(val)}.jpg', image_data)


def generate_email():
    # Список возможных символов для email адреса
    characters = string.ascii_letters + string.digits + '_-'
    # Случайное имя пользователя для email адреса
    username = ''.join(choice(characters) for i in range(randint(5, 10)))
    # Случайный домен для email адреса
    domains = ['gmail.com', 'yahoo.com', 'mail.ru', 'yandex.ru', 'hotmail.com']
    domain = choice(domains)
    # Собираем email адрес из имени пользователя и домена
    email = username + '@' + domain
    return email


# Списки возможных значений для генерации адреса
streets = ['ул. Ленина', 'ул. Кирова',
           'ул. Гагарина', 'пр. Победы',
           'ул. Советская', 'ул. Мира',
           "ул. Ленина", "ул. Гагарина",
           "ул. Кирова", "ул. Красноармейская",
           "ул. Советская", "ул. Мира",
           "ул. Пушкина", "ул. Лермонтова",
           "ул. Гоголя", "ул. Тургенева",
           "ул. Достоевского", "ул. Чехова",
           "ул. Горького", "ул. Толстого", "ул. Шевченко",
           "ул. Фрунзе", "ул. Калинина", "ул. Маркса",
           "ул. Ломоносова", "ул. Луначарского", "ул. Космонавтов",
           "пр. Ленина", "пр. Мира", "пр. Октября", "пр. Победы",
           "пр. Революции", "пр. Свободы", "пр. Кирова", "пр. Гагарина",
           "пр. Чуйкова", "пр. Авиационный", "пр. Салавата Юлаева",
           "пр. Карла Маркса", "пр. Московский", "пр. Проспект",
           "бул. Шевченко", "бул. Дружбы", "бул. Гагарина", "бул. Кутузова",
           "бул. Французский", "бул. Кольцевой", "бул. Мира", "бул. Ленина"
           ]

houses = [str(i) for i in range(1, 120)]
flats = [str(i) for i in range(1, 250)]
cities = ['Донецк', 'Севастополь',
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
          'Саратов', 'Смоленск',
          'Тамбов', 'Тверь',
          'Томск', 'Тула',
          'Тюмень', 'Ульяновск',
          'Челябинск', 'Ярославль']


def generate_address():
    # Выбираем случайные значения для адреса
    street = choice(streets)
    house = choice(houses)
    flat = choice(flats)
    city = choice(cities)
    # Собираем адрес из выбранных значений
    address = f"{city}, {street}, {house}, кв. {flat}"
    return address


names_m = ['Александр', 'Сергей', 'Дмитрий', 'Андрей', 'Алексей', 'Михаил', 'Николай', 'Иван', 'Петр', 'Владимир',
           'Евгений', 'Павел', 'Роман', 'Олег', 'Кирилл', 'Виктор', 'Георгий', 'Степан', 'Игорь', 'Федор',
           'Тимофей', 'Ярослав', 'Борис', 'Григорий', 'Леонид',
           'Джеймс', 'Джон', 'Роберт', 'Майкл', 'Уильям',
           'Дэвид', 'Ричард', 'Чарльз', 'Джозеф', 'Томас',
           'Эдуард', 'Артем', 'Вадим', 'Денис', 'Захар',
           'Илья', 'Константин', 'Лев', 'Матвей', 'Назар']

surnames_m = ['Иванов', 'Петров', 'Сидоров', 'Смирнов', 'Кузнецов', 'Васильев', 'Попов', 'Федоров', 'Морозов',
              'Новиков',
              'Козлов', 'Лебедев', 'Николаев', 'Орлов', 'Андреев', 'Макаров', 'Никитин', 'Захаров', 'Зайцев',
              'Соловьев',
              'Борисов', 'Яковлев', 'Григорьев', 'Романов', 'Воробьев', 'Сергеев', 'Кузьмин', 'Фролов', 'Алексеев',
              'Кудрявцев',
              'Герасимов', 'Козырев', 'Мартынов', 'Егоров', 'Дмитриев', 'Кошелев', 'Санников', 'Мещеряков', 'Широков',
              'Фомин',
              'Данилов', 'Беляев', 'Тарасов', 'Белов', 'Комаров', 'Березин', 'Ефимов', 'Денисов', 'Тихонов', 'Крылов',
              'Комиссаров', 'Суслов', 'Миронов', 'Харитонов', 'Громов', 'Константинов', 'Мельников', 'Калинин',
              'Терентьев', 'Бирюков',
              'Ларин', 'Шестаков', 'Кулагин', 'Гусев', 'Щербаков', 'Киселев', 'Маслов', 'Королев', 'Меркушев', 'Бобров',
              'Фокин', 'Горбунов', 'Лихачев', 'Соболев', 'Рудаков', 'Жуков', 'Рябов', 'Савельев', 'Пахомов', 'Лавров',
              'Исаев', 'Степанов', 'Лукин', 'Тимофеев', 'Кондратьев', 'Кулаков', 'Гришин', 'Сазонов', 'Мальцев',
              'Ситников',
              'Якушев', 'Сорокин', 'Карпов', 'Гаврилов', 'Абрамов', 'Мясников', 'Третьяков', 'Кочетков', 'Гущин',
              'Рогов'
              ]

patronymics_m = ['Александрович', 'Анатольевич', 'Андреевич', 'Антонович', 'Борисович', 'Валерьевич', 'Васильевич',
                 'Викторович',
                 'Владимирович', 'Вячеславович', 'Геннадьевич', 'Георгиевич', 'Дмитриевич', 'Евгеньевич', 'Егорович',
                 'Игоревич',
                 'Ильич', 'Константинович', 'Леонидович', 'Максимович', 'Михайлович', 'Николаевич', 'Олегович',
                 'Павлович',
                 'Петрович', 'Романович', 'Семенович', 'Сергеевич', 'Станиславович', 'Степанович', 'Тимофеевич',
                 'Федорович', 'Юрьевич']

names_w = ['Александра', 'Алина', 'Алиса', 'Алла', 'Анастасия', 'Ангелина', 'Анна', 'Антонина', 'Арина', 'Ася',
           'Богдана', 'Валентина', 'Валерия', 'Варвара', 'Василиса', 'Вера', 'Вероника', 'Виктория', 'Галина', 'Дарья',
           'Ева', 'Евгения', 'Екатерина', 'Елена', 'Жанна', 'Зинаида', 'Злата', 'Зоя', 'Илона', 'Инга',
           'Инесса', 'Ирина', 'Карина', 'Кира', 'Клавдия', 'Кристина', 'Лада', 'Лариса', 'Лейла', 'Лиана',
           'Лидия', 'Лилия', 'Любовь', 'Людмила', 'Маргарита', 'Марина', 'Мария', 'Милана', 'Надежда', 'Наталья',
           'Нина', 'Оксана', 'Ольга', 'Полина', 'Светлана', 'София', 'Тамара', 'Татьяна', 'Ульяна', 'Юлия',
           'Агнесса', 'Аделина', 'Азалия', 'Айгуль', 'Айлин', 'Айнур', 'Айша', 'Аксинья', 'Алевтина', 'Алинара',
           'Алира', 'Алисия', 'Аллахверди', 'Альберта', 'Альвина', 'Альмира', 'Альфия', 'Амина', 'Анабель',
           'Ангелика', 'Анисья', 'Анита', 'Аннет', 'Антонелла', 'Антония', 'Анфиса', 'Ариэль', 'Асель', 'Асия',
           'Ассоль', 'Астра', 'Асхиа', 'Асят', 'Афанасия', 'Белла', 'Валериана', 'Ванда', 'Василина', 'Венера',
           'Вероничка', 'Викториана', 'Вилена', 'Виргиния', 'Габриэла', 'Гаяна', 'Гелла', 'Гертруда', 'Гизелла',
           'Глория', 'Грета', 'Далия', 'Дания', 'Даниэль'
           ]

surnames_w = ['Абрамова', 'Авдеева', 'Агафонова', 'Акимова', 'Александрова', 'Алексеева', 'Андреева', 'Анисимова',
              'Антонова', 'Артемьева',
              'Архипова', 'Афанасьева', 'Баранова', 'Белова', 'Белоусова', 'Беляева', 'Белякова', 'Березина',
              'Беспалова', 'Бирюкова',
              'Блинова', 'Богданова', 'Борисова', 'Бурова', 'Васильева', 'Виноградова', 'Власова', 'Волкова',
              'Воробьева', 'Гаврилова',
              'Галкина', 'Герасимова', 'Голубева', 'Горбачева', 'Горбунова', 'Гордеева', 'Григорьева', 'Данилова',
              'Демидова', 'Денисова',
              'Дмитриева', 'Доронина', 'Евдокимова', 'Евсеева', 'Егорова', 'Елисеева', 'Емельянова', 'Ермакова',
              'Ефимова', 'Жукова', 'Абзалова', 'Абрамчук', 'Агальцова', 'Агапова', 'Агаркова', 'Аджиева', 'Азанова',
              'Айватова', 'Айвазова', 'Айзенберг',
              'Айламазян', 'Айрапетян', 'Акбарова', 'Акименко', 'Аксенова', 'Аксенчук', 'Аксюткина', 'Акулова',
              'Александрина', 'Алекян',
              'Аленичева', 'Алентьева', 'Алешкова', 'Алимова', 'Алтухова', 'Амелина', 'Аминова', 'Андропова',
              'Андрущенко', 'Аниканова',
              'Анисимович', 'Аносова', 'Антипова', 'Антонович', 'Ануфриева', 'Аполихина', 'Апресян', 'Аптекарь',
              'Арбузова', 'Аржакова',
              'Арнольд', 'Аронова', 'Артамонова', 'Архангельская', 'Асеева', 'Асмолова', 'Астахова', 'Астраханцева',
              'Атаманова', 'Атласова']

patronymics_w = ['Александровна', 'Алексеевна', 'Анатольевна', 'Андреевна', 'Антоновна', 'Борисовна', 'Вадимовна',
                 'Валентиновна', 'Валериевна', 'Васильевна',
                 'Викторовна', 'Витальевна', 'Владимировна', 'Вячеславовна', 'Геннадиевна', 'Георгиевна', 'Григорьевна',
                 'Дмитриевна', 'Евгеньевна', 'Егоровна',
                 'Ивановна', 'Игоревна', 'Константиновна', 'Леонидовна', 'Максимовна', 'Михайловна', 'Николаевна',
                 'Олеговна', 'Павловна', 'Петровна']


def generate_phone_number():
    # Формат номера телефона: +7 XXX XXX-XX-XX
    # Генерируем случайные значения для каждой части номера телефона
    first_part = '7' + str(randint(900, 999))
    second_part = str(randint(100, 999))
    third_part = str(randint(10, 99))
    fourth_part = str(randint(10, 99))
    # Собираем номер телефона из сгенерированных значений
    phone_number = f"+{first_part}{second_part}{third_part}{fourth_part}"
    return phone_number


def generate_password(length=8):
    # Список возможных символов для пароля
    characters = string.ascii_letters + string.digits + string.punctuation
    # Случайный пароль заданной длины
    password = ''.join(choice(characters) for i in range(length))
    return password


for i in range(10200):
    name = choice(names_w)
    surname = choice(surnames_w)
    patronymic = choice(patronymics_w)
    birthday_year = randint(1960, 2005)
    birthday_month = randint(1, 12)
    if birthday_month < 10:
        birthday_month = "0" + str(birthday_month)
    birthday_day = randint(1, 28)
    if birthday_day < 10:
        birthday_day = "0" + str(birthday_day)
    birthday = f"{birthday_year}-{birthday_month}-{birthday_day}"
    gender = 0
    email = generate_email()
    university = randint(198, 284)
    speciality = randint(3, 65)
    status = randint(1, 5)
    city = randint(3, 43)
    address = generate_address()
    phone = generate_phone_number()
    password = generate_password()

    # headers = {
    #     "Content-Type": "multipart/form-data"  # Указываем тип контента
    # }
    #
    # files = {
    #     "applicant_photo": returnPhoto(gender)
    # }
    #
    # data = {"name": name, "surname": surname, "patronymic": patronymic, "gender": gender, "email": email,
    #         "birthday": birthday, "education_id": university, "speciality_id": speciality, "status_id": status,
    #         "city_id": city, "address": address, "phone": phone, "password": password}
    #
    # # print(data)
    #
    # a= requests.post("http://agency/api/delete.php", data=data, files=files, headers=headers)

    import requests

    # Устанавливаем URL-адрес, на который нужно отправить запрос
    url = 'http://agency/api/delete.php'

    # Устанавливаем параметры запроса в виде словаря
    data = {
        'name': name,
        'surname': surname,
        'patronymic': patronymic,
        'gender': gender,
        'email': email,
        'birthday': birthday,
        'education_id': university,
        'speciality_id': speciality,
        'status_id': status,
        'city_id': city,
        'address': address,
        'phone': phone,
        'password': password
    }

    # Добавляем файл к запросу
    files = {
        'applicant_photo': (returnPhoto(gender)[0], returnPhoto(gender)[1], 'image/jpeg')
    }

    # Отправляем POST-запрос с параметрами и файлом
    response = requests.post(url, data=data, files=files)

    # Выводим результат запроса на экран
    print(loads(response.text))
