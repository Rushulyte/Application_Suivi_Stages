import json
import random
import os


def main():
    with open(f"../keys/master_gen.json") as f:
        settings = json.load(f)

    if not os.path.isdir(f'../keys/db/'):
        os.mkdir(f"../keys/db/")

    with open(f"../keys/db/root.key", "w+") as f:
        f.write('')

    random.seed(f"{settings['secret']}")

    with open(f"../keys/db/app.key", "w+") as f:
        f.write(''.join(random.choice(settings['base']) for _ in range(settings['length'])))

    print('done')


if __name__ == '__main__':
    main()
