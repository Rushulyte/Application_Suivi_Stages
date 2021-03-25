import hashlib
import os

import mysql.connector


class User:
    _types = ('admin', 'prof', 'élève')

    def __init__(self, _type, login, first, last, password):
        self.type_id = self._types.index(_type) + 1

        self.login = login
        self.first = first
        self.last = last

        self.password = password

    @property
    def hash(self):
        return hashlib.sha512(self.password.encode('utf-8')).hexdigest()


USERS = (
    User("admin", 'a', '_', '_', "qsdfghjklm"),
    User("prof", 'p', '_', '_', "azertyuiop"),
    User("élève", 'e', '_', '_', "hello world"),
)


def main():
    with open("../../keys/db/root.key") as f:
        connection = mysql.connector.connect(host="localhost", user="root", password=f.read())

    cursor = connection.cursor()

    if not os.path.isdir("../../keys/users/"):
        os.mkdir("../../keys/users/")

    for user in USERS:
        cursor.execute(
            "insert into ass.users (identifiant, first_name, last_name, authentication_string, id_account_type)"
            "values (%s, %s, %s, %s, %s);", params=(user.login, user.first, user.last, user.hash, user.type_id)
        )

        with open(f"../../keys/users/{user.login}.key", 'w+') as f:
            f.write(user.password)

    connection.commit()
    print('done')


if __name__ == '__main__':
    main()
