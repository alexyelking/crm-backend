{
  "header": "Список всех существующих ключей валидации и пояснения к ним",
  "validation":
  {
    "auth":
    {
      "name":
      {
        "required":
        {
          "code": "validation.auth.name.required",
          "message": "Имя пользователя является обязательным"
        },
        "string":
        {
          "code": "validation.auth.name.string",
          "message": "Имя пользователя должно быть строкой"
        },
        "min":
        {
          "code": "validation.auth.name.min.length",
          "message": "Минимальная длина имени пользователя:3"
        },
        "max":
        {
          "code": "validation.auth.name.max.length",
          "message": "Максимальная длина имени пользователя:50"
        }
      },
      "email":
      {
        "required":
        {
          "code": "validation.auth.email.required",
          "message": "Емэйл пользователя является обязательным"
        },
        "string":
        {
          "code": "validation.auth.email.string",
          "message": "Емэйл пользователя должен быть строкой"
        },
        "min":
        {
          "code": "validation.auth.email.min.length",
          "message": "Минимальная длина емэйла пользователя:3"
        },
        "max":
        {
          "code": "validation.auth.email.max.length",
          "message": "Максимальная длина емэйла пользователя:50"
        },
        "email":
        {
          "code": "validation.auth.email.email",
          "message": "Невалидный емэйл пользователя"
        },
        "unique":
        {
          "code": "validation.auth.email.unique",
          "message": "Емэйл пользователя должен быть уникальным"
        }
      },
      "password":
      {
        "required":
        {
          "code": "validation.auth.password.required",
          "message": "Пароль пользователя является обязательным"
        },
        "string":
        {
          "code": "validation.auth.password.string",
          "message": "Пароль пользователя должен быть строкой"
        },
        "min":
        {
          "code": "validation.auth.password.min.length",
          "message": "Минимальная длина пароля пользователя:6"
        },
        "max":
        {
          "code": "validation.auth.password.max.length",
          "message": "Максимальная длина пароля пользователя:50"
        },
        "confirmed":
        {
          "code": "validation.auth.password.confirmed",
          "message": "Пароль пользователя должен быть подтверждён"
        }
      }
    },
    "clients":
    {
      "name":
      {
        "required":
        {
          "code": "validation.clients.name.required",
          "message": "Имя клиента является обязательным"
        },
        "string":
        {
          "code": "validation.clients.name.string",
          "message": "Имя клиента должно быть строкой"
        },
        "min":
        {
          "code": "validation.clients.name.min.length",
          "message": "Минимальная длина имени клиента:3"
        },
        "max":
        {
          "code": "validation.clients.name.max.length",
          "message": "Максимальная длина имени клиента:50"
        }
      },
      "email":
      {
        "required":
        {
          "code": "validation.clients.email.required",
          "message": "Емэйл клиента является обязательным"
        },
        "string":
        {
          "code": "validation.clients.email.string",
          "message": "Емэйл клиента должен быть строкой"
        },
        "min":
        {
          "code": "validation.clients.email.min.length",
          "message": "Минимальная длина емэйла клиента:3"
        },
        "max":
        {
          "code": "validation.clients.email.max.length",
          "message": "Максимальная длина емэйла клиента:50"
        },
        "email":
        {
          "code": "validation.clients.email.email",
          "message": "Невалидный емэйл клиента"
        },
        "unique":
        {
          "code": "validation.clients.email.unique",
          "message": "Емэйл клиента должен быть уникальным"
        }
      },
      "phone":
      {
        "required":
        {
          "code": "validation.clients.phone.required",
          "message": "Пароль клиента является обязательным"
        },
        "string":
        {
          "code": "validation.clients.phone.string",
          "message": "Пароль клиента должен быть строкой"
        },
        "min":
        {
          "code": "validation.clients.phone.min.length",
          "message": "Минимальная длина пароля клиента:6"
        },
        "max":
        {
          "code": "validation.clients.phone.max.length",
          "message": "Максимальная длина пароля клиента:50"
        },
        "unique":
        {
          "code": "validation.clients.phone.unique",
          "message": "Телефон клиента должен быть уникальным"
        }
      }
    },
    "other":
    {
      "general":
      {
        "code": "validation.incorrect.data",
        "message": "Некоторые данные невалидны"
      }
    }
  }
}