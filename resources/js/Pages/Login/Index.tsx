import { FormModel } from "@narsil-forms/Types";
import { Link } from "@inertiajs/react";
import { useTranslationsStore } from "@narsil-localization/Stores/translationStore";
import Button from "@narsil-ui/Components/Button/Button";
import Form from "@narsil-forms/Components/Form/Form";
import FormProvider from "@narsil-forms/Components/Form/FormProvider";
import FormRenderer from "@narsil-forms/Components/Form/FormRenderer";
import Fullscreen from "@narsil-ui/Components/Fullscreen/Fullscreen";
import FullscreenToggle from "@narsil-ui/Components/Fullscreen/FullscreenToggle";
import Section from "@narsil-ui/Components/Section/Section";
import SectionContent from "@narsil-ui/Components/Section/SectionContent";
import SectionFooter from "@narsil-ui/Components/Section/SectionFooter";
import SectionHeader from "@narsil-ui/Components/Section/SectionHeader";
import SectionTitle from "@narsil-ui/Components/Section/SectionTitle";
import useForm from "@narsil-forms/Components/Form/useForm";

interface Props {
	form: FormModel;
	registerable: boolean;
	status: string;
}

const Index = ({ form, registerable, status }: Props) => {
	const { trans } = useTranslationsStore();

	const reactForm = useForm({
		form: form,
	});

	return (
		<FormProvider {...reactForm}>
			<Form route={route("login")}>
				<Fullscreen>
					<Section>
						<SectionHeader>
							<SectionTitle>{form.title}</SectionTitle>
							<FullscreenToggle />
						</SectionHeader>
						<SectionContent>
							<FormRenderer nodes={form.nodes} />
							{registerable ? (
								<div className='flex flex-wrap items-center gap-x-1'>
									<span>{trans("No account?")}</span>

									<Button
										asChild={true}
										size='default'
										type='button'
										variant='link'
									>
										<Link href={route("register")}>{trans("Sign up")}</Link>
									</Button>
								</div>
							) : null}
							<div className='flex flex-wrap items-center gap-x-1'>
								<span>{trans("Forgot your password?")}</span>
								<Button
									asChild={true}
									size='default'
									type='button'
									variant='link'
								>
									<Link href={route("password.request")}>{trans("Reset password")}</Link>
								</Button>
							</div>
							{status ? <span className='text-constructive font-medium'>{status}</span> : null}
						</SectionContent>
						<SectionFooter>
							<Button type='submit'>{trans("Sign in")}</Button>
						</SectionFooter>
					</Section>
				</Fullscreen>
			</Form>
		</FormProvider>
	);
};

export default Index;
