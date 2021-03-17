import random
import string


class App:

    def __init__(self):
        self.is_running = False
        with open("../keys/master_gen.key") as f:
            self.master_key_gen = f.read()

    def __call__(self):
        is_running = True

        while is_running:
            random.seed(f"{self.master_key_gen}{input('user : ')}")

            base = ''.join((string.ascii_letters, string.digits, '-_'))
            print(''.join(random.choice(base) for _ in range(32)))


if __name__ == '__main__':
    App()()
