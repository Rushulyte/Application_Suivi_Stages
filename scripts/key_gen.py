import random
import string

with open("../keys/master_gen.key") as f:
    master_key_gen = f.read()
random.seed(f"{master_key_gen}{input('user : ')}")

base = ''.join((string.ascii_letters, string.digits, '-_'))
print(''.join(random.choice(base) for _ in range(32)))
