class Configuration(object):
    DEBUG = True
    SQLALCHEMY_TRACK_MODIFICATIONS = False
    SQLALCHEMY_DATABASE_URI = 'mysql+mysqlconnector://root:root@172.17.0.1/test1'
    #имя БД имя движка :// админ БД : пароль @ адрес / имя БД
